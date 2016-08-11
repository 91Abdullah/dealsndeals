<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Product;

use App\Category;

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
        /*$product = Product::findOrFail($request->id);
        $file = $request->file('file');
        $destinationPath = 'uploads';
        $dir = Storage::makeDirectory('uploads/'.$product->name);
        // If the uploads fail due to file system, you can try doing public_path().'/uploads'
        //$filename = str_random(12);
        $filename = $file->getClientOriginalName();
        //$extension =$file->getClientOriginalExtension();
        $upload_success = $request->file('file')->move($destinationPath, $dir.DIRECTORY_SEPARATOR.$filename);*/

        $upload_success = true;

        if( $upload_success ) {
            return response()->json($request->file('file'));
            //return response()->json(['success', '200']);
        } else {
            return response()->json(['error', 400]);
        }
    }

    public function image($id)
    {
        return view('admin.product.images', compact('id'));
    }

    public function success($id)
    {

    }
}
