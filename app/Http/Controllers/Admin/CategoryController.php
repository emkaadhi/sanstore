<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $request->file('image')->move('images/category', $request->file('image')->getClientOriginalName());

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->file('image')->getClientOriginalName(),
        ]);
        Alert::success('Berhasil', 'Kategori berhasil dibuat');
        return redirect('/category');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());

        if ($request->hasFile('image')) {
            $request->file('image')->move('images/category', $request->file('image')->getClientOriginalName());
            $category->image = $request->file('image')->getClientOriginalName();
            $category->save();
        }

        Alert::success('Berhasil', 'Profile berhasil diupdate');

        return redirect('/category');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        $products = Product::where('category_id', $category->id)->get();

        foreach ($products as $product) {
            $product->delete();
        }

        return back();
    }
}
