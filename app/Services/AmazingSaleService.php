<?php

namespace App\Services;

use Illuminate\Support\Carbon;

class AmazingSaleService
{
    /**
     * Determines is active.
     *
     * @param \Illuminate\Support\Carbon $start_date
     * @param \Illuminate\Support\Carbon $end_date
     * @param bool $status
     * @return bool
     */
    public function isActive(Carbon $start_date, Carbon $end_date, bool $status = true): bool
    {
        return $start_date->lte(now()) and
            $end_date->gte(now()) and
            $status;
    }
}
