<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $cats = Category::all();
        return view('admin.categories.index', compact('cats'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name'=>'required|string']);
        $slug = strtolower(str_replace(' ','-',$data['name']));
        Category::create(['name'=>$data['name'],'slug'=>$slug]);
        return redirect('/admin/categories');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate(['name'=>'required|string']);
        $category->update(['name'=>$data['name'],'slug'=>strtolower(str_replace(' ','-',$data['name']))]);
        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/admin/categories');
    }
}
