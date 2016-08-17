<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Order;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::all();
        return view('admin.customer.index', compact('orders'));
    }

    public function create()
    {
        return view('admin.customer.create');
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
        $customer = Order::create($request->all());
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
