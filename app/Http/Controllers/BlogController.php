<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function category($slug) {
        $category = Category::where('slug', $slug)->first();

        return view('blog.category', [
            'category' => $category,
            'products' => $category->products()->where('published', 1)->paginate(12)
        ]);
    }
    public function product($slug) {
        return view('blog.product',[
            'product' =>Product::where('slug', $slug)->first()
        ]);
    }
}
