<?php

namespace App\Rules\Admin\Market;

use App\Models\Market\ProductCategory;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProductVariantsRule implements Rule
{
    private string $message = 'دوباره امتحان کنید.';

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(private ProductCategory $productCategory)
    {
        //
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
        $productVariants = $value;
        $categorySelectableValues = collect($this->productCategory->selectableValues->toArray());

        if (!$productVariants) {
            $this->message = 'حداقل یک قیمت باید برای کالا ثبت کنید.';

            return false;
        }

        // price,number validation
        $fails = false;

        collect($productVariants)->each(function ($variant) use (&$fails) {
            $validator = Validator::make($variant, [
                'price' => 'required|numeric|min:1',
                'number' => 'required|integer|min:1|max:100',
                'items.*.label' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
                'items.*.value' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
                'items.*.mainValue' => 'required|numeric'
            ]);

            if ($validator->fails()) {
                $fails = $validator->fails();

                return false;
            }
        });

        if ($fails) {
            $this->message = 'تعداد یا قیمت به درستی وارد نشده است. و تعداد باید کمتر از  ۱۰۰ باشد.';

            return false;
        }

        // this category can select this attribute and value
        $selectableAttributes = $categorySelectableValues
            ->pluck('selectable_attribute.id')
            ->unique();
        $selectedAttributes = collect($productVariants)
            ->pluck('items.*.attribute_id')
            ->flatten()
            ->unique();

        if ($selectableAttributes->diff($selectedAttributes)->isNotEmpty()) {
            return false;
        }

        $groupedVariants = collect($productVariants)
            ->pluck('items')
            ->flatten(1)
            ->groupBy('attribute_id')
            ->toArray();

        foreach ($groupedVariants as $attribute_id => $values) {
            $values = collect($values)
                ->unique()
                ->toArray();

            foreach ($values as $value) {
                $isEmpty = $categorySelectableValues
                    ->where('selectable_attribute.id', $attribute_id)
                    ->where('id', $value['mainValue'])
                    ->isEmpty();

                if ($isEmpty) {
                    return false;
                }

                $isEmpty = $categorySelectableValues
                    ->where('selectable_attribute.id', $attribute_id)
                    ->where('value', $value['value'])
                    ->isEmpty();

                if ($isEmpty) {
                    return false;
                }
            }
        }

        /** user setted active variant and not multiple active */
        $countActive = collect($productVariants)
            ->where('active', true)
            ->count();

        if ($countActive !== 1) {
            $this->message = 'یک قیمت را بعنوان قیمت اصلی انتخاب کنید.';

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
        return $this->message;
    }
}
