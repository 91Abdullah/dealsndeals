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
        $destinationPath = "uploads/" . $product->name;
        $upload_success = false;
        $image = new Image();
        $extension = $file->getClientOriginalExtension();
        $index = count($product->images);
        $filename = $product->name . "-" . $index . "." . $extension;
        $image->name = $filename;
        ($index == "0" ? $image->is_cover = true : $image->is_cover = false);
        $upload_success = $file->move($destinationPath, $filename);
        if ($upload_success) {
            $image->name = $filename;
            $product->images()->save($image);
        }
        if ($upload_success) {
            return response()->json(['code'=>200, 'image'=>$product->images]);
        } else {
            return response()->json(['code'=>400]);
        }
    }

    public function image($id)
    {
        return view('admin.product.images', compact('id'));
    }
}
