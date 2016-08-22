<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Customer;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::all();
        return view('admin.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('admin::customer.index');
    }

    public function view($id)
    {

    }

    public function save(Request $request)
    {
        $customer = Customer::create($request->all());
        return redirect()->route('admin::customer.index');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit', compact('customer'));
    }

    public function delete($id)
    {

    }
}
