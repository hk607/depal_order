<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *2
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products  = 'active';
        $product_list = Product::get();
        return view('admin.products.index',compact('product_list','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products  = 'active';
        $categories = \App\Models\Category::pluck('name', 'id');
        return view('admin.products.create',compact('products','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
{
    $this->validate($request, [
        'name'                => 'required|string|unique:products,name',
        'category_id'         => 'required|exists:categories,id',
        'price'               => 'required|numeric|min:0',
        'brand'               => 'nullable|string',
        'diet_type'           => 'nullable|string',
        'flavour'             => 'nullable|string',
        'net_content_volume'  => 'nullable|integer',
        'special_feature'     => 'nullable|string',
        'liquid_volume'       => 'nullable|integer',
        'package_quantity'    => 'nullable|integer',
        'shelf_life_days'     => 'nullable|integer',
        'item_form'           => 'nullable|string',
        'speciality'          => 'nullable|string',
        'description'         => 'nullable|string',
    ]);

    try {
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name); // Optional: Auto-generate slug
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->diet_type = $request->diet_type;
        $product->flavour = $request->flavour;
        $product->net_content_volume = $request->net_content_volume;
        $product->special_feature = $request->special_feature;
        $product->liquid_volume = $request->liquid_volume;
        $product->package_quantity = $request->package_quantity ?? 1;
        $product->shelf_life_days = $request->shelf_life_days;
        $product->item_form = $request->item_form;
        $product->speciality = $request->speciality;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    } catch (\Exception $e) {
        return back()->withError($e->getMessage())->withInput();
    }
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $product = Product::find($id);
    if ($product) {
        $products = 'active';
        $categories = Category::pluck('name', 'id'); // Load categories for dropdown
        return view('admin.products.update', compact('products', 'product', 'categories'));
    } else {
        return redirect()->route('products.index')->with('error', 'No product found!');
    }
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */

public function update(Request $request, $id)
{
    $request->validate([
        'name'               => 'required|string|max:255|unique:products,name,' . $id,
        'category_id'        => 'required|exists:categories,id',
        'price'              => 'required|numeric|min:0',
        'brand'              => 'nullable|string|max:255',
        'diet_type'          => 'nullable|string|max:255',
        'flavour'            => 'nullable|string|max:255',
        'net_content_volume' => 'nullable|numeric',
        'special_feature'    => 'nullable|string|max:255',
        'liquid_volume'      => 'nullable|numeric',
        'package_quantity'   => 'nullable|integer|min:1',
        'shelf_life_days'    => 'nullable|integer|min:0',
        'item_form'          => 'nullable|string|max:255',
        'speciality'         => 'nullable|string|max:255',
        'description'        => 'nullable|string',
    ]);

    try {
        $product = Product::findOrFail($id);

        $data = $request->except(['_token', '_method']);

        $product->update($data);

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully!');
    } catch (\Illuminate\Database\QueryException $exception) {
        return back()->withError($exception->errorInfo[2])->withInput();
    } catch (\Exception $e) {
        return back()->withError('Something went wrong.')->withInput();
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $Product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::where('id',$id)->delete();
        return redirect()->route('products.index')
                         ->with('success','Product deleted successfully');
    }
}
