<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Category, Product};
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

    public function categoryDetail($slug){
         $url = '';
        $category = Category::where('slug', $slug)->firstOrFail();
        // dd($category->id);
        // Get products with images only for this category
        $product_lists = Product::where('category_id', $category->id)
                    ->paginate(12); // Optional: add ->get() if no pagination needed

        $product_list = Product::get(); // used for something else in your view?
        // dd($products);
        return view('category-details', compact('url', 'product_list','product_lists', 'category'));
    }

}
