<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'title' => __('Users'),
        ]);
    }

    public function create()
    {
        $roles = user_roles();

        return view('admin.users.add', [
            'title' => __('Add User'),
            'section_title' => __('Users'),
            'roles' => $roles,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:75'],
            'email' => ['required', 'string', 'email', 'max:100', Rule::unique('users')],
            'username' => ['required', 'string', 'max:25', Rule::unique('users')],
            'password' => ['required', 'string', new Password()],
        ]);

        (new UserService)->create($request);

        return to_route('admin.users.index')->with('success', __('Record added successfully.'));
    }

    public function edit(User $user)
    {
        $this->authorize('notPrimary', $user);

        $roles = user_roles();
        $user_role = $user->roles->first()?->id;

        return view('admin.users.edit', [
            'title' => __('Edit User'),
            'section_title' => __('Users'),
            'row' => $user,
            'roles' => $roles,
            'user_role' => $user_role,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('notPrimary', $user);

        $request->validate([
            'name' => ['required', 'string', 'max:75'],
            'email' => ['required', 'string', 'email', 'max:100', Rule::unique('users')->ignore($user->id)],
            'username' => ['required', 'string', 'max:25', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', new Password()],
        ]);

        (new UserService)->update($request, $user);

        return back()->with('success', __('Record updated successfully.'));
    }

    public function destroy(User $user)
    {
        $this->authorize('notPrimary', $user);

        $user->delete();

        return back()->with('success', __('Record deleted successfully.'));
    }
}
