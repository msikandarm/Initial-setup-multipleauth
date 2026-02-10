<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StatusController extends Controller
{
    public function __invoke(Request $request)
    {
        $modelName = "\\App\Models\\".$request->model;
        $fieldName = $request->field_name;

        $modelKebab = Str::kebab($request->model);
        $role = 'update-'.$modelKebab.'-status';

        if (! $request->user()->can($role)) {
            abort(403);
        }

        $model = $modelName::findOrFail($request->id);
        $model->$fieldName = $request->value;
        $model->save();

        return response()->json('success');
    }
}
