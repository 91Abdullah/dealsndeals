<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Address;
use App\Customer;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all();
        return view('admin.address.index', compact('addresses'));
    }

    public function create()
    {
        $customers = Customer::all()->pluck('name', 'id');
        return view('admin.address.create', compact('customers'));
    }

    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $address->update($request->all());
        return redirect()->route('admin::address.index');
    }

    public function view($id)
    {

    }

    public function save(Request $request)
    {
        $customer = Customer::findOrFail($request->customer);
        $address = Address::create($request->all());
        $customer->address()->save($address);
        return redirect()->route('admin::address.index');
    }

    public function edit($id)
    {
        $address = Address::findOrFail($id);
        $customers = Customer::all()->pluck('name', 'id');
        return view('admin.address.edit', compact('address', 'customers'));
    }

    public function delete($id)
    {
        $address = Address::destroy($id);
        return redirect()->route('admin::address.index');
    }
}
