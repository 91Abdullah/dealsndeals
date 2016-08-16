<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Image;

use App\Product;

class ImageController extends Controller
{
    //
    public function upload(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $file = $request->file('file');
        $image = new Image();
        $image->is_cover = false;
        $image->product_image = $file;
        $image->save();
        $or = $product->images()->save($image);
        return response()->json([
            'code' => 200,
            'data' => $or
        ]);
    }

    public function index($id)
    {
        $product = Product::findOrFail($id);
        $images  = $product->images;
        return view('admin.product.images', compact('images', 'id'));
    }

    public function destroyMany(array $ids)
    {
        Image::destroy($ids);
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $response = Image::destroy($request->id);
        if ($response)
            return response()->json($response, 200);
        else
            return response()->json('failed', 400);
    }

    public function setCover(Request $request)
    {
        $image = Image::where('product_id', $request->id)->where('is_cover', true)->update(['is_cover' => false]);
        $image = Image::findOrFail($request->id);
        $image->is_cover = true;
        $response = $image->update();
        if ($response)
            return response()->json($response, 200);
        else
            return response()->json('failed', 400);
    }
}
