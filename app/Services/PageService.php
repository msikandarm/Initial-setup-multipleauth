<?php

namespace App\Services;

use App\Models\Page;
use Illuminate\Http\Request;

class PageService
{
    public function create(Request|array $request): Page
    {
        $page = new Page();

        $page->title = $request['title'];
        $page->data = $request['data'];

        $page->save();

        $page->generateSlug();
        $page->saveSeo();

        return $page;
    }

    public function update(Request|array $request, Page $page): Page
    {
        $page->title = $request['title'];
        $page->data = $request['data'];

        $page->save();

        if (isset($request['slug']) && ! $page->is_default) {
            $page->updateSlug($request['slug']);
        }

        $page->saveSeo();

        return $page;
    }
}
