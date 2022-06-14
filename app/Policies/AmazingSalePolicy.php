<?php

namespace App\Policies;

use App\Models\AmazingSale;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AmazingSalePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() && $user->hasPermission('amazing_sale_view_any');
    }
}
