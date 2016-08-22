<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\Customer;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order;
use App\Voucher;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::all();
        return $orders;
    }

    public function create()
    {
        $customers = Customer::all()->pluck('name', 'id');
        $products = Product::all()->pluck('name', 'id');
        $vouchers = Voucher::all()->pluck('number', 'id');
        return view('admin.order.create', compact('customers', 'products', 'vouchers'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return redirect()->route('admin::order.index');
    }

    public function view($id)
    {

    }

    public function save(Request $request)
    {
        $cart = new Cart();
        $order = Order::create($request->all());
        return redirect()->route('admin::order.index');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.edit', compact('order'));
    }

    public function delete($id)
    {

    }
}
