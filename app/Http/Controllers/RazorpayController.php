<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Redirect;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Hotelroom;
use Auth;
use Mail;

class RazorpayController extends Controller
{
    public function razorpay(Request $request)
    {
        $id = $request->input('id');
        $bookingDetail = Booking::find($id);
        if($bookingDetail) {
            if(Auth::user()->id == $bookingDetail->user_id) {
                $razor_pay_detail = $this->get_razorpay_key($bookingDetail->hotel_id);
                if($razor_pay_detail['key'] != '' && $razor_pay_detail['secret'] != '') {
                    $hotel_detail = Hotel::find($bookingDetail->hotel_id);
                    $roomDetail   =  Hotelroom::where('id',$bookingDetail->room_id)->with('roomdetails')->first();
                    return view('razorpay-index',compact('bookingDetail','hotel_detail','roomDetail','razor_pay_detail'));
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
        $razor_pay_detail = $this->get_razorpay_key($input['hotel_id']);
        $api = new Api($razor_pay_detail['key'], $razor_pay_detail['secret']);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
      
        if(count($input)  && !empty($input['razorpay_payment_id'])) 
        {
            try 
            {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $orderId  = $response->notes->shopping_order_id;
                $update   = Booking::find($orderId);
                $bookIdDetail = $this->getBooking();
                $update->room_payment_id = $input['razorpay_payment_id'];
                $update->status = "1";
                $update->year = $bookIdDetail['year'];
                $update->booking_id = $bookIdDetail['id'];
                $update->booking_number = $bookIdDetail['number'];
                $update->save();
                return redirect()->route('success-message',$bookIdDetail['number']);
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

    public function success_message($bookingNumber) {
        $bookingDetail = Booking::where('booking_number', $bookingNumber)->with(['hotels','hotelroom.roomdetails.types'])->first();
        if($bookingDetail) {
            $this->send_mail($bookingDetail,$bookingDetail->email);
            return view('success_message', compact('bookingDetail'));
        }
    }
    private function send_mail($bookingDetail,$email) {
        Mail::to($email)->cc('sandhyapalace@gmail.com')->send(new \App\Mail\MyTestMail($bookingDetail));
    }
}    
