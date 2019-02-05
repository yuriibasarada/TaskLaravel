<?php

namespace App\Http\Controllers\Admin;

use App\product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index', [
            'products' => product::orderBy('created_at', 'desc')->paginate(10)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.products.create', [


            'product' => [],
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $productData = [
        'title' => $request->title,
        'description' => $request->description,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
        'meta_keyword' => $request->meta_keyword,
        'published' => $request->published,
        'slug' => $request->slug,
        'created_by ' =>$request->created_by,
        'description_short' =>$request->description_short
        ];
        if ($request->image) {
            $upload_dir = 'images';
            $avatar_filename = $request->image->getClientOriginalName();
            $request->image->storeAS('public/' . $upload_dir, $avatar_filename);
            $avatar_path = 'storage/' . $upload_dir . '/' . $avatar_filename;
            $productData['image'] = $avatar_path;
        }
        $product = Product::create($productData);


        //Categories

        if ($request->input('categories')) :
            $product->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter' => ''

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $product->update($request->except('slug', 'image'));

        //Categories
        $product->categories()->detach();
        if ($request->input('categories')) :
            $product->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->categories()->detach();
        $product->delete();

        return redirect()->route('admin.product.index');

    }
}
