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
    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        $cart[$productId]['quantity']++;
    } else {
        $cart[$productId] = [
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->price,
            'image' => $product->get_first_image_url ?? 'default.jpg'
        ];
    }

    // Save to DB cart table
    $userId = Auth::check() ? Auth::id() : null;

    $existing = Cart::where('user_id', $userId)
        ->where('product_id', $productId)
        ->first();

    if ($existing) {
        $existing->increment('quantity');
    } else {
        Cart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => 1
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
    Cart::where('id', $id)->where('user_id', auth()->id())->delete();
    return redirect()->back()->with('success', 'Item removed from cart.');
}
}
