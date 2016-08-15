<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Product;

use App\Category;

use App\Image;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Http\Response;

use Storage;
use TarunMangukiya\ImageResizer\Facades\ImageResizer;

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

    public function upload(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $file = $request->file('file');
        $image = new Image();
        $image->product_image = $file;
        $image->save();
        $or = $product->images()->save($image);
        return response()->json([
            'code' => 200,
            'data' => $product->images,
            'or' => $or
        ]);
    }

    public function image($id)
    {
        $product = Product::findOrFail($id);
        $images  = $product->images;
        //return view('admin.product.images', compact('images', 'id'));
        //return $images;
    }
}
