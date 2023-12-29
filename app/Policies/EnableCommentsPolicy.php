<?php

// app/Policies/EnableCommentsPolicy.php
namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnableCommentsPolicy
{
    use HandlesAuthorization;

    public function enableComments(User $user)
    {
        return $user->isAdmin();
    }
}
