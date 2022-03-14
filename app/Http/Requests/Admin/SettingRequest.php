<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'title' => 'nullable|string|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'keywords' => 'nullable|string|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'logo' => 'nullable|image|max:500',
            'icon' => 'nullable|image|max:500',
            'description' => 'nullable|string',
            'phone_number' => ["nullable","string","regex:/^[0-9|+]+$/ui"],
            'available_hours' => "nullable|string|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui"
        ];
    }
}
