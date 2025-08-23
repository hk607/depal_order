<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request , $productId)
    {

    $product = Product::findOrFail($productId);
    $quantity = 1;
    $cart = session()->get('cart', []);
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity']+=$request->quantity ?? $quantity;
    } else {
        $cart[$productId] = [
            'name' => $product->name,
            'quantity' => $request->quantity ?? $quantity ,
            'price' => $product->price,
            'image' => $product->first_image_url ?? 'default.jpg'
        ];
    }
    // dd($cart);
    // Save to DB cart table
    $userId = Auth::check() ? Auth::id() : null;

    $existing = Cart::where('user_id', $userId)
        ->where('product_id', $productId)
        ->first();

    if ($existing) {
        $existing->increment('quantity', $request->input('quantity', 1));
    } else {
        Cart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $request->quantity ?? $quantity
        ]);
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Product added to cart!');
}

public function viewCart()
{
    $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
    return view('cart', compact('cartItems'));
}

public function remove($id)
{
    session()->forget('cart');
    $userId = auth()->id();
    Cart::where('id', $id)->where('user_id', auth()->id())->delete();
    $cartItems = Cart::where('user_id', $userId)->with('product')->get();

    $cart = [];
    foreach ($cartItems as $item) {
        $cart[$item->product_id] = [
            'name'     => $item->product->name,
            'quantity' => $item->quantity,
            'price'    => $item->product->price,
            'image'    => $item->product->first_image_url ?? 'default.jpg',
        ];
    }

    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Item removed from cart.');
}
}
