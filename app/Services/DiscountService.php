<?php

namespace App\Services;

class DiscountService
{
    /**
     * Calculates discount of amount.
     *
     * @param int $amount
     * @param int $percentage
     * @return int
     */
    public function calculate(int $amount = 0, int $percentage = 0): int
    {
        return $amount - $amount * ($percentage / 100);
    }
}
