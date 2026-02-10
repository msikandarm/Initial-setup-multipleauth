<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Laravel\Prompts\Prompt;

class DashboardController extends Controller
{
   public function index(){

    $categories = Category::get();

     return view('frontend.index', compact('categories'));
   }

   public function cat_view($id){

    $category = Category::where('slug',$id)->first();
    $products = Product::where('category_id', $category->id)->get();

     return view('frontend.cat_products', compact('category','products'));
   }

   public function pro_view($id){

    $product = Product::where('slug',$id)->first();

     return view('frontend.product_view', compact('product'));
   }

   public function customer(){

    return view('customer.dashboard', [
        'title' => __('Dashboard'),
    ]);
   }
}
