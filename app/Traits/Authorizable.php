<?php

namespace App\Traits;

trait Authorizable
{
    /**
     * Determines the user has the given permission name.
     *
     * @param string $permissionName
     * @return bool
     */
    public function hasPermission(string $permissionName): bool
    {
        return $this->allPermissions()->contains('name', $permissionName);
    }
}
