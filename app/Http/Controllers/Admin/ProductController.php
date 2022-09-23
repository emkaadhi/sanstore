<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'rating' => 'required',
            'small_description' => 'required',
            'description' => 'required',
        ]);

        $request->file('image')->move('images/product', $request->file('image')->getClientOriginalName());

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'rating' => $request->rating,
            'small_description' => $request->small_description,
            'description' => $request->description,
            'image' => $request->file('image')->getClientOriginalName(),
        ]);

        Alert::success('Berhasil', 'Product berhasil dibuat');

        return redirect('/product');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/product', $request->file('image')->getClientOriginalName());
            $product->image = $request->file('image')->getClientOriginalName();
            $product->save();
        }

        Alert::success('Berhasil', 'Profile berhasil diupdate');

        return redirect('/product');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return back();
    }
}
