<?php

namespace App\Rules\Admin\Market;

use App\Models\Market\ProductCategory;
use Illuminate\Contracts\Validation\ImplicitRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AttributeValueRule implements ImplicitRule
{
    /**
     * array of attributes with their values
     */
    private ?array $attributeValues;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(?array $attributeValues, private ProductCategory $productCategory)
    {
        $this->attributeValues = collect($attributeValues)->filter()->toArray();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $productCategory = $this->productCategory;

        if (is_null($this->attributeValues) && $productCategory->attributes->isNotEmpty()) {
            return false;
        }

        // check attributes
        $attributeIds = array_keys($this->attributeValues);

        if(collect($productCategory->attributes->pluck('id'))->diff($attributeIds)->isNotEmpty()) {
            return false;
        }

        // check values
        $valueIds = $this->attributeValues;
        $isEmpty = false;

        collect($valueIds)->each(function ($valueId, $attributeId) use ($productCategory, &$isEmpty) {
            $isEmpty = $productCategory->attributes
                ->where('id', $attributeId)
                ->map(fn ($attribute) => $attribute->defaultValues)
                ->flatten()
                ->pluck('id')
                ->filter(fn ($item) => $item == $valueId)
                ->isEmpty();

            if ($isEmpty) {
                return false;
            }
        });

        if ($isEmpty) {
            return false;
        }
        
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'همه خصوصیات را انتخاب کنید .';
    }
}
