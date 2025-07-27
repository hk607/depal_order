<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Product};
use Validator;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class   ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($slug){
        $url='';
        $product_list = Product::get();
        $product = Product::with('images')->where('slug', $slug)->firstOrFail();
        // dd($product->images);
        return view('product-details',compact('url','product_list','product'));
    }

}
