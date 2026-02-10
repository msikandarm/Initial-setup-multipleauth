<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\PageService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:show-pages')->only(['index', 'show']);
        $this->middleware('can:add-page')->only(['create', 'store']);
        $this->middleware('can:edit-page')->only(['edit', 'update']);
        $this->middleware('can:delete-page')->only(['destroy']);
    }

    public function index()
    {
        return view('admin.pages.index', [
            'title' => __('Pages'),
        ]);
    }

    public function create()
    {
        return view('admin.pages.add', [
            'title' => __('Add Page'),
            'section_title' => __('Pages'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:200'],
        ]);

        (new PageService)->create($request);

        return to_route('admin.pages.index')->with('success', __('Record added successfully.'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', [
            'title' => __('Edit Page'),
            'section_title' => __('Pages'),
            'row' => $page,
        ]);
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:200'],
        ]);

        (new PageService)->update($request, $page);

        return back()->with('success', __('Record updated successfully.'));
    }

    public function destroy(Page $page)
    {
        $this->authorize('notDefault', $page);

        $page->delete();

        return back()->with('success', __('Record deleted successfully.'));
    }
}
