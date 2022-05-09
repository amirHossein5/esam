<?php

namespace App\Repositories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Collection;

class ProvinceRepository
{
    /**
     * Returns listing of the resource.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all(): Collection
    {
        return cache()->remember('provinces', 60*60*24*30*4, function () {
            return Province::all();
        });
    }
}
