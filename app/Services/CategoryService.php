<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{

    public function create(Request|array $request): Category
    {
        $category = new Category();

        $category->title = $request['title'];

        if ( $request->hasFile( 'image' ) ) {

            $category->image =  $category->upload( $request->image, 'false', 'category' );
        }
        // $category->slug = $category->generateSlug();

        $category->save();

        $category->generateSlug();

        $category->saveSeo();

        return $category;
    }

    public function update(Request|array $request, Category $category): Category
    {
        $category->title = $request['title'];

        if ( $request->hasFile( 'image' ) ) {
            $category->deletefile( $category->image, 'category' );
            $category->image =  $category->upload( $request->image, 'false', 'category' );
        }
        if (isset($request['slug']) && ! $category->is_default) {
            $category->slug= updateSlug($request['slug']);
        }

        $category->save();

        if (isset($request['slug']) && ! $category->is_default) {
            $category->updateSlug($request['slug']);
        }

        $category->saveSeo();

        return $category;
    }
}
