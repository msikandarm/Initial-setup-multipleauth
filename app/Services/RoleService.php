<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleService
{
    public function create(Request|array $request): Role
    {
        $role = new Role();

        $role->name = $request['name'];
        $role->guard_name = 'web';

        $role->save();

        $role->syncPermissions($request['permissions']);

        return $role;
    }

    public function update(Request|array $request, Role $role): Role
    {
        $role->name = $request['name'];

        $role->save();

        $role->syncPermissions($request['permissions']);

        return $role;
    }
}
