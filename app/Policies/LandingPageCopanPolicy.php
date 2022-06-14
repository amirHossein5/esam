<?php

namespace App\Policies;

use App\Models\LandingPageCopan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LandingPageCopanPolicy
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
        return $user->isAdmin() && $user->hasPermission('landing_page_copan_view_any');
    }
}
