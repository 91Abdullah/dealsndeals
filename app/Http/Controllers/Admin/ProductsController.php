<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Product;

use App\Category;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::roots()->first()->children()->get()->pluck('name', 'id');
        return view('admin.product.new', compact('categories'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::roots()->first()->children()->get()->pluck('name', 'id');
        return $product->categories()->get();
        //return view('admin.product.edit', compact('product', 'categories'));
    }

    public function save(Request $request)
    {
        $product = Product::create($request->all());
        $product->categories()->attach($request->categories);
        return redirect()->route('admin::product.index');
    }
}
