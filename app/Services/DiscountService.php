<?php

namespace App\Services;

class DiscountService
{
    /**
     * Calculates discount of amount.
     *
     * @param ?int $ceil
     * @param int $amount
     * @param int $percentage
     * @return int
     */
    public function calculate(int $amount = 0, int $percentage = 0, ?int $ceil = null): int
    {
        return $amount - $this->getDiscount($amount, $percentage, $ceil);
    }

    /**
     * Returns discount.
     *
     * @param ?int $ceil
     * @param int $amount
     * @param int $percentage
     * @return int
     */
    public function getDiscount(int $amount = 0, int $percentage = 0, ?int $ceil = null): int
    {
        $discount = $amount * ($percentage / 100);

        return $ceil
            ? ($discount > $ceil ? $ceil : $discount)
            : $discount;
    }
}
