<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate as FacadesGate;

class Gate
{
    /**
     * Determine if any one of the given abilities should be granted for the current user.
     *
     * Checks multiple abilities by multiple policie(s).
     *
     * @param array $abilities<string policy, array|string ability>
     * @return bool
     */
    public function checkAny(array $abilities): bool
    {
        $result = false;

        foreach ($abilities as $policy => $abilities) {
            if (is_string($abilities)) {
                $abilities = [$abilities];
            }

            foreach ($abilities as $ability) {
                if (FacadesGate::check($ability, $policy) or $result) {
                    $result = true;
                } else {
                    $result = false;
                }
            }
        }

        return $result;
    }

    /**
     * Determine if all of the given abilities should be granted for the current user.
     *
     * Checks multiple abilities by multiple policie(s).
     *
     * @param array $abilities<string policy, array|string ability>
     * @return bool
     */
    public function checkEvery(array $abilities): bool
    {
        $result = true;

        foreach ($abilities as $policy => $abilities) {
            if (FacadesGate::check($abilities, $policy) and $result) {
                $result = true;
            } else {
                $result = false;
            }
        }

        return $result;
    }
}
