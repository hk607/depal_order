<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $total = $cartItems->sum(fn ($item) => $item->product->price * $item->quantity);

        $order = Order::create([
            'user_id' =>Auth::id(),
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'total_amount' => $total,
            'payment_status' => 'pending',
            'order_status' => 'processing',
            'shipping_address' => $request->shipping_address ?? '',
            'billing_address' => $request->billing_address ?? '',
            // 'shipping_method' => $request->shipping_method ?? '',
            'payment_method' =>  $request->payment_method ?? 'Razorpay',
            // 'notes' => $request->notes,
        ]);

        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('order.success')->with('success', 'Order placed successfully.');
    }

    public function checkout()
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        $user = auth()->user();
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
        }
        $shippingAddress = $user->addresses()->where('type', 'shipping')->first();
        return view('checkout', compact('cartItems','shippingAddress'));
    }

    public function orderSuccess()
    {
        // Optionally clear the session/cart
        session()->forget('cart');

        return view('success');
    }
}
