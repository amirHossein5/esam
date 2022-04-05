<?php

namespace App\Services\Admin\Market;

use Illuminate\Database\Eloquent\Collection;

class ProductVariantService
{
    /**
     * Determines that the intended product variant selectable attribute was created or not.
     *
     * @return bool
     */
    public function selectable_attribute_exists(
        Collection $productVariants,
        array $receivedVariant
    ): bool {
        $filtered = null;

        $selectable_attributes = collect($productVariants->toArray())
            ->pluck('selectable_attributes')
            ->flatten(1)
            ->groupBy('variant_id')
            ->toArray();

        if ($productVariants->filter()->isNotEmpty()) {

            foreach ($receivedVariant['items'] as $key => $value) {
                $filtered = collect($filtered ?? $selectable_attributes)
                    ->filter(function ($item) use ($value) {
                        return collect($item)
                            ->where('attribute_id', $value['attribute_id'])
                            ->where('value_id', (int) $value['mainValue'])
                            ->isNotEmpty();
                    })->toArray();

                if (empty($filtered)) {
                    return false;
                } else if (count($receivedVariant['items']) - 1 == $key) {
                    return true;
                }
            }
        }

        return false;
    }
}
