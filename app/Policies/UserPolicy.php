<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function notPrimary(User $logged_user, User $user)
    {
        return $user->id !== 1;
    }
}
