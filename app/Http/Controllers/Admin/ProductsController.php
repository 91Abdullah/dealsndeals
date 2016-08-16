<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Product;

use App\Category;

use App\Image;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();
        //return Product::with('images')->first()->images->first()->product_image->thumbnail->url;
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::roots()->first()->children()->get()->pluck('name', 'id');
        return view('admin.product.new', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        $product->categories()->sync($request->categories);
        \Session::flash('success', 'Product updated successfully');
        return redirect()->route('admin::product.index');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->categories()->detach();
        $product->delete();
        \Session::flash('success', 'Product deleted successfully');
        return redirect()->route('admin::product.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::roots()->first()->children()->get()->pluck('name', 'id');
        $selected = $product->categories()->get()->pluck('id')->toArray();
        //return $selected;
        return view('admin.product.edit', compact('product', 'categories', 'selected'));
    }

    public function save(Request $request)
    {
        $product = Product::create($request->all());
        $product->categories()->sync($request->categories);
        \Session::flash('success', 'Category created successfully');
        return redirect()->route('admin::product.index');
    }
}
