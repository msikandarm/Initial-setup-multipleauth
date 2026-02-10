<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile', [
            'title' => __('Profile'),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', Rule::unique('users')->ignore($request->user()->id)],
            'username' => ['required', 'string', 'max:20', Rule::unique('users')->ignore($request->user()->id)],
            'password' => ['nullable', 'string', new Password(), 'confirmed'],
        ]);

        (new UserService)->update($request, $request->user());

        return back()->with('success', __('Profile updated successfully.'));
    }
}
