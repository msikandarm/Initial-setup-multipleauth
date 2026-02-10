<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'title' => __('Categories'),
        ]);
    }

    public function create()
    {
        
        return view('admin.categories.add', [
            'title' => __('Add Category'),
            'section_title' => __('Categories'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'image' => ['required'],
        ]);

        (new CategoryService)->create($request);

        return to_route('admin.categories.index')->with('success', __('Record added successfully.'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'title' => __('Edit Category'),
            'section_title' => __('Categories'),
            'row' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:200'],
        ]);

        (new CategoryService)->update($request, $category);

        return back()->with('success', __('Record updated successfully.'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', __('Record deleted successfully.'));
    }
}
