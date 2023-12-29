<?php
// app/Policies/DisableCommentsPolicy.php
namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DisableCommentsPolicy
{
    use HandlesAuthorization;

    public function disableComments(User $user)
    {
        return $user->isAdmin();
    }
}

