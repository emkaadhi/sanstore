<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('frontend.index', compact('products', 'categories'));
    }

    public function category($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', $category->id)->get();
        return view('frontend.category', compact('category', 'products'));
    }

    public function product()
    {
        $products = Product::all();
        return view('frontend.front-product', compact('products'));
    }

    public function view_product($id)
    {
        $product = Product::where('id', $id)->first();
        return view('frontend.view-product', compact('product'));
    }
}
