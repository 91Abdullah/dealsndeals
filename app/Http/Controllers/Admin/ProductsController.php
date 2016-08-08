<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductsController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        return view('admin.product.new');
    }
}
