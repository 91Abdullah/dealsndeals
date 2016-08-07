<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', ['categories' => $category]);
    }

    public function create()
    {
        $category = Category::all()->pluck('name', 'id');
        return view('admin.category.create', compact('category'));
    }

    public function save(Request $request)
    {
        $parent = Category::findOrFail($request['parent_id']);
        $category = Category::create($request->all(), $parent);
        return redirect()->route('admin::category.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parent = Category::all()->pluck('name', 'id');
        return view('admin.category.edit', compact('category', 'parent'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('admin::category.index');
    }
}
