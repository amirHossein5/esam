<?php

namespace App\Rules\Admin\Market;

use App\Models\Market\ProductCategory;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProductMetasRule implements Rule
{
    private array $productMetas;
    private string $error = 'مشخصه های تکراری وارد نکنید.';

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $productMetas, private ProductCategory $productCategory)
    {
        $this->productMetas = json_decode($productMetas, true);
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
        if (!$this->productMetas) {
            $this->error = 'حداقل یک قیمت باید برای کالا ثبت کنید.';

            return false;
        }

        // price,number validation
        $fails = false;

        collect($this->productMetas)->each(function ($meta) use (&$fails) {
            $validator = Validator::make($meta, [
                'price' => 'required|numeric|min:1',
                'number' => 'required|integer|min:1',
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
            return false;
        }

        // dont be repeatedly
        // $selectableMetasNumber = count($this->productMetas[0]['items']);

        // collect($this->productMetas)
        //     ->map(function ($meta) {
        //         return $meta['items'][0]['value'];
        //     })
        //     ->unique()
        //     ->dd();

        collect($this->productMetas)
            ->map(function ($meta) {
                return $meta['items'];
            })->filter(function ($meta) {
                return $meta[0]['value'] == 'سیاه';
            })->filter(function ($meta) {
                return $meta[1]['mainValue'] == '2';
            })->dd();






        foreach ($this->productMetas as $currentKey => $currentMeta) {
            $otherMetas = collect($this->productMetas)->reject(function ($item, $key) use ($currentKey) {
                return $key == $currentKey;
            })->toArray();

            foreach ($currentMeta['items'] as $key => $currentItem) {
                foreach ($otherMetas as $meta) {

                    if ($meta['items'][$key]['label'] == $currentItem['label']) {
                        if ((int) $meta['items'][$key]['mainValue'] != (int) $currentItem['mainValue']) {
                            continue;
                        }
                    }

                }
            }

            // if ($isSame) {
            //     return false;
            // }
        }

        dd(1);
        // selectable metas id
        // selectable metas value

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->error;
    }
}
