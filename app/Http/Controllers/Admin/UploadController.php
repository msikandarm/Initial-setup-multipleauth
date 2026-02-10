<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function __invoke(Request $request)
    {
        $file = $request->file;
        $path = $file->store('tinymce', 'public');

        return response()->json([
            'location' => Storage::disk('public')->url($path),
        ]);
    }
}
