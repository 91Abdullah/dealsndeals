<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cart;

class CartController extends Controller
{
    //
    //
    public function index()
    {
        $carts = Cart::all();
        return view('admin.order.index', compact('carts'));
    }

    public function create()
    {
        //return view('admin.customer.create');
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update($request->all());
        return redirect()->route('admin::order.index');
    }

    public function view($id)
    {

    }

    public function save(Request $request)
    {
        $cart = Cart::create($request->all());
        return redirect()->route('admin::order.index');
    }

    public function edit($id)
    {
        $cart = Cart::findOrFail($id);
        return view('admin.order.edit', compact('cart'));
    }

    public function delete($id)
    {

    }
}
