<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index', [
            'title' => __('Roles'),
        ]);
    }

    public function create()
    {
        $permissions = Permission::query()
            ->whereGuardName('web')
            ->whereNull('permission_id')
            ->with('groupPermissions')
            ->orderBy('name')
            ->get();

        return view('admin.roles.add', [
            'title' => __('Add Role'),
            'section_title' => __('Roles'),
            'permissions' => $permissions,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles')->where('guard_name', 'web')],
            'permissions' => ['required', 'array', 'min:1'],
        ]);

        (new RoleService)->create($request);

        return to_route('admin.roles.index')->with('success', __('Record added successfully.'));
    }

    public function edit(Role $role)
    {
        $this->authorize('notPrimary', $role);

        $role_permissions = $role->permissions->pluck('id')->toArray();

        $permissions = Permission::query()
            ->whereGuardName('web')
            ->whereNull('permission_id')
            ->with('groupPermissions')
            ->orderBy('name')
            ->get();

        return view('admin.roles.edit', [
            'title' => __('Edit Role'),
            'section_title' => __('Roles'),
            'row' => $role,
            'role_permissions' => $role_permissions,
            'permissions' => $permissions,
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $this->authorize('notPrimary', $role);

        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('roles')->where('guard_name', 'web')->ignore($role->id)],
            'permissions' => ['required', 'array', 'min:1'],
        ]);

        (new RoleService)->update($request, $role);

        return back()->with('success', __('Record updated successfully.'));
    }

    public function destroy(Role $role)
    {
        $this->authorize('notPrimary', $role);

        $role->delete();

        return back()->with('success', __('Record deleted successfully.'));
    }
}
