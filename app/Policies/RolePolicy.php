<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function notPrimary(User $user, Role $role)
    {
        return ! $role->is_primary;
    }
}
