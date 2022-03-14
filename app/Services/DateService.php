<?php

namespace App\Services;

use Illuminate\Support\Collection;

class DateService
{
    /**
     * Returns day month year separately.
     *
     * @param Illuminate\Support\Collection $dates
     * @return array
     */
    public function getSeparatedDates(Collection $dates): array
    {
        $years = [];
        $months = [];
        $days = [];

        $dates->each(function ($date) use (&$years, &$months, &$days) {
            $years[] = jFormat($date, '%Y');
            $months[] = jFormat($date, '%m');
            $days[] = jFormat($date, '%d');
        });

        $years = collect($years)->sort()->unique();
        $months = collect($months)->sort()->unique();
        $days = collect($days)->sort()->unique();

        return [
            'years' => $years,
            'months' => $months,
            'days' => $days,
        ];
    }
}
