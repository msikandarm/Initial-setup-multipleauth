<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductService
{

    public function create(Request|array $request): Product
    {
        $product = new Product();

        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->category_id = $request['category_id'];

        if ( $request->hasFile( 'image' ) ) {

            $product->image =  $product->upload( $request->image, 'false', 'product' );
        }

        $product->save();

        $product->generateSlug();

        $product->saveSeo();

        return $product;
    }

    public function update(Request|array $request, Product $product): Product
    {
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->category_id = $request['category_id'];

        if ( $request->hasFile( 'image' ) ) {
            $product->deletefile( $product->image, 'product' );
            $product->image =  $product->upload( $request->image, 'false', 'product' );
        }

        $product->save();

        if (isset($request['slug']) && ! $product->is_default) {
            $product->updateSlug($request['slug']);
        }

        $product->saveSeo();

        return $product;
    }
}
