<?php

namespace App\Http\Requests\Admin\Market\Product;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            'images.*' => 'required|image|file|max:1000'
        ];
    }

    public function attributes(): array
    {
        return [
            'images.*' => __('validation.attributes.image')
        ];
    }
}
