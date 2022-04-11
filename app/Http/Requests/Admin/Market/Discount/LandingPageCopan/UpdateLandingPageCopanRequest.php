<?php

namespace App\Http\Requests\Admin\Market\Discount\LandingPageCopan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLandingPageCopanRequest extends FormRequest
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
            'image' => 'nullable|mimes:png,jpg,jpeg,gif,webp|file|max:1000',
            'copan_id' => 'required|exists:copans,id',
            'start_date' => 'required|numeric|regex:/^[0-9]+$/u',
            'end_date' => 'required|numeric|regex:/^[0-9]+$/u',
        ];
    }
}
