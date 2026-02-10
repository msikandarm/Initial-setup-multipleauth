<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', [
            'title' => __('Products'),
        ]);
    }

    public function create()
    {
        $categories = categories();

        return view('admin.products.add', [
            'title' => __('Add Product'),
            'section_title' => __('Products'),
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required'],
            'image' => ['required'],
        ]);

        (new ProductService)->create($request);

        return to_route('admin.products.index')->with('success', __('Record added successfully.'));
    }

    public function edit(Product $product)
    {
        $categories = categories();

        return view('admin.products.edit', [
            'title' => __('Edit Product'),
            'section_title' => __('Products'),
            'row' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required'],
        ]);

        (new ProductService)->update($request, $product);

        return back()->with('success', __('Record updated successfully.'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', __('Record deleted successfully.'));
    }

    
}
