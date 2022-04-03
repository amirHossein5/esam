<?php

namespace App\Rules\Admin\Market\ProductCategory;

use App\Models\Market\SelectableAttribute;
use Illuminate\Contracts\Validation\Rule;

class SelectableValuesRule implements Rule
{
    private $message = 'دوباره امتحان کنید.';

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $values
     * @return bool
     */
    public function passes($attribute, $values)
    {
        $attribute_id = preg_replace('/^([^\.]+)\.(.+)$/', "\\2", $attribute);

        $values = collect($values)->filter();

        if ($values->isEmpty()) {
            $this->message = 'حداقل یک مقدار باید انتخاب کنید.';
            return false;
        }

        // values are belongs to attribute
        $attribute = SelectableAttribute::with('values:id,selectable_attribute_id')->findOrFail($attribute_id);

        $attributeValueIds = collect($attribute->values->toArray())->map(fn ($value) => $value['id'])->flatten();

        foreach ($values->toArray() as $value) {
            if (!$attributeValueIds->contains($value)) {
                return false;
            }
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
