<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Redirect;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Hotelroom;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Auth;
use Mail;

class RazorpayController extends Controller
{
    public function razorpay($id)
    {
        // $id = $request->input('id');
        $order = Order::find($id);
        if($order) {
            if(Auth::user()->id == $order->user_id) {
                $razor_pay_detail = $this->get_razorpay_key(1);
                if($razor_pay_detail['key'] != '' && $razor_pay_detail['secret'] != '') {
                    $order_item = OrderItem::where('order_id',$order->id)->first();
                    $products   =  Product::where('id',$order_item->product_id)->first();
                    $user = User::find(Auth::user()->id);
                    return view('razorpay-index',compact('order_item','products','order','user','razor_pay_detail'));
                } else {
                    return redirect()->back()->with('error','Online Payment is not possible of this hotel Please Contact to Administrator!');
                }
            } else {
                return redirect()->back()->with('error','You are not Authorised');
            }
        } else {
            return redirect()->back()->with("error",'No detail Found!');
        }

    }

    public function payment(Request $request)
    {
        $input = $request->all();
        $razor_pay_detail = $this->get_razorpay_key(1);
        $api = new Api($razor_pay_detail['key'], $razor_pay_detail['secret']);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id']))
        {
            try
            {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $orderId  = $response->notes->shopping_order_id;
                $order   = Order::find($orderId);
                $order->payment_status = "paid";
                $order->payment_method = "Razorpay";
                $order->order_status = "processing";
                $order->save();

                $paymentRecord = Payment::create([
                'order_id'            => $order->id,
                'user_id'             => $order->user_id,
                'payment_method'      => 'Razorpay',
                'payment_status'      => 'paid',
                'razorpay_order_id'   => $response->order_id ?? null,
                'razorpay_payment_id' => $response->id ?? $input['razorpay_payment_id'],
                'razorpay_signature'  => $input['razorpay_signature'] ?? null,
                'amount'              => $response->amount / 100, // Razorpay gives paise
                'currency'            => $response->currency ?? 'INR',
            ]);

            // ✅ Insert into transactions table
            Transaction::create([
                'payment_id'            => $paymentRecord->id,
                'order_id'              => $order->id,
                'user_id'               => $order->user_id,
                'type'                  => 'credit',
                'amount'                => $response->amount / 100,
                'transaction_status'    => 'success',
                'transaction_reference' => $response->id, // Razorpay payment_id
                'remarks'               => 'Payment received successfully via Razorpay',
            ]);
                return redirect()->route('success-message',$order->order_number);
            }
            catch (\Exception $e)
            {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
        return redirect()->back();
    }

    private function get_razorpay_key($id) {
        switch ($id) {
          case 1:
            $data['key']    = env('RAZOR_KEY');
            $data['secret'] = env('RAZOR_SECRET');
            break;
          case 2:
            $data['key']    = env('RAZOR_KASOL_KEY');
            $data['secret'] = env('RAZOR_KASOL_SECRET');
            break;
          case 3:
            $data['key']    = '';
            $data['secret'] = '';
            break;
          default:
            $data['key']    = '';
            $data['secret'] = '';
        }
        return $data;
    }

    public function getBooking()
    {
        $lastbooking = Booking::where(['status'=>1,'year' => date('Y')])->latest('id')->first();
        if($lastbooking) {
           $Id = $lastbooking->booking_id + 1;
        } else {
            $Id = 1;
        }
        if($Id > 0 && $Id < 10) {
            $booking_number = date('Y') . "-000" . $Id;
        } elseif($Id > 9 && $Id < 100) {
            $booking_number = date('Y') . "-00" . $Id;
        } elseif($Id > 99 && $Id < 1000) {
            $booking_number = date('Y') . "-0" . $Id;
        } else {
            $booking_number = date('Y') . "-".$Id;
        }
        $data['id']     = $Id;
        $data['number'] = $booking_number;
        $data['year'] = date('Y');
        return $data;
    }

    public function success_message($order_number) {
        $bookingDetail = Order::where('order_number', $order_number)->with(['items'])->first();
        $user = User::find($bookingDetail->user_id);
        if($bookingDetail) {
            $this->send_mail($bookingDetail,$user->email);
            return view('success_message', compact('bookingDetail'));
        }
    }
    private function send_mail($bookingDetail,$email) {
        Mail::to($email)->cc('sandhyapalace@gmail.com')->send(new \App\Mail\MyTestMail($bookingDetail));
    }
}
