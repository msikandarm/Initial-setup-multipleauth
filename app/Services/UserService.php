<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function create(Request|array $request): User
    {
        $user = new User();

        $user->name = $request['name'];
        $user->username = $request['username'];
        $user->email = $request['email'];
        $user->password = $request['password'];

        $user->save();

        $user->assignRole($request['role']);

        return $user;
    }

    public function update(Request|array $request, User $user): User
    {
        $user->name = $request['name'];
        $user->username = $request['username'];
        $user->email = $request['email'];

        if (isset($request['password']) && ! empty($request['password'])) {
            $user->password = $request['password'];
        }

        $user->save();

        if (isset($request['role'])) {
            $user->syncRoles([$request['role']]);
        }

        return $user;
    }
}
