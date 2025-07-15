<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories  = 'active';
        $category_list = Category::get();
        return view('admin.categories.index',compact('category_list','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories  = 'active';
        return view('admin.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
{
    $request->validate([
        'name'             => 'required|string|max:255|unique:categories,name',
        'slug'             => 'nullable|string|max:255|unique:categories,slug',
        'description'      => 'nullable|string',
        'meta_key'         => 'nullable|string|max:255',
        'meta_description' => 'nullable|string|max:255',
    ]);

   $data = $request->except('_token');

    // Generate slug if not manually entered
    if (empty($data['slug'])) {
        $data['slug'] = Str::slug($data['name']);
    }

    // Ensure slug is unique
    $originalSlug = $data['slug'];
    $counter = 1;
    while (Category::where('slug', $data['slug'])->exists()) {
        $data['slug'] = $originalSlug . '-' . $counter++;
    }

    Category::create($data);

    return redirect()->route('categories.index')->with('success', 'Category created successfully!');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        if($category) {
            $categories = 'active';
            return view('admin.categories.update',compact('category','categories'));
        } else {
            return redirect()->route('categories.index')->with('error','no detail Found!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);

    $request->validate([
        'name'             => 'required|string|max:255|unique:categories,name,' . $category->id,
        'slug'             => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
        'description'      => 'nullable|string',
        'meta_key'         => 'nullable|string|max:255',
        'meta_description' => 'nullable|string|max:255',
    ]);

    $data = $request->except('_token');

    // Auto-generate slug if not given
    if (empty($data['slug'])) {
        $data['slug'] = Str::slug($data['name']);
    }

    // Ensure updated slug is unique
    $originalSlug = $data['slug'];
    $counter = 1;
    while (Category::where('slug', $data['slug'])->where('id', '!=', $category->id)->exists()) {
        $data['slug'] = $originalSlug . '-' . $counter++;
    }

    $category->update($data);

    return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Category::where('id',$id)->delete();
        return redirect()->route('categories.index')
                         ->with('success','Category deleted successfully');
    }
}
