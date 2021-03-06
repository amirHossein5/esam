<?php

namespace App\Http\Requests\Admin\Market\ProductCategory;

use App\Rules\Admin\Market\ProductCategory\SelectableValuesRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|regex:/^[\w\-\.۰−۹آ-یء ,]+$/iu',
            'show_in_menu' => 'required|numeric|in:0,1',
            'parent_id' => 'nullable|numeric|regex:/^[0-9]+$/|exists:product_categories,id',
            'image'       => 'nullable|image|file|max:1000',
            'description' => 'required|string',

            'selectableValues.*' => new SelectableValuesRule(),
        ];
    }
}
