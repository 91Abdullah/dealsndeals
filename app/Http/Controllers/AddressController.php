<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Address;

class AddressController extends Controller
{
    public function index()
    {
        $address = Address::all();
        return view('address.customer.index', compact('address'));
    }

    public function create()
    {
        return view('admin.address.create');
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
        $address = Address::create($request->all());
        return redirect()->route('admin::address.index');
    }

    public function edit($id)
    {
        $address = Address::findOrFail($id);
        return view('admin.address.edit', compact('address'));
    }

    public function delete($id)
    {
        $address = Address::destroy($id);
        return redirect()->route('admin::address.index');
    }
}
