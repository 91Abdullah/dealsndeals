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
        $categories = Category::root()->children()->get();
        $breadcrumb = Category::root()->getRoot()->name;
        return view('admin.category.index', compact('categories', 'breadcrumb'));
    }

    public function view($id)
    {
        $categories = Category::findOrFail($id)->children()->get();
        $breadcrumb = Category::findOrFail($id)->name;
        return view('admin.category.index', compact('categories', 'breadcrumb'));
    }

    public function create()
    {
        $category = Category::all()->pluck('name', 'id');
        return view('admin.category.create', compact('category'));
    }

    public function save(Request $request)
    {
        $root = Category::findOrFail($request->parent_id)->children()->create($request->all());
        \Session::flash('success', 'Category created successfully');
        return redirect()->route('admin::category.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parent = Category::where('id', '!=', $category->id)->pluck('name', 'id');
        return view('admin.category.edit', compact('parent', 'category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        if ($request->parent_id != $category->parent_id)
            $category->parent_id = $request->parent_id;
        $category->update($request->all());
        \Session::flash('success', 'Category updated successfully');
        return redirect()->route('admin::category.index');

    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        \Session::flash('success', 'Category deleted successfully');
        return redirect()->route('admin::category.index');
    }
}
