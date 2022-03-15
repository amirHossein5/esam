<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => 'required|string',
            "description" => "required|string",
            "permissions.*" => "nullable|string|exists:permissions,id",
        ];
    }

    public function attributes(): array
    {
        return [
            'permissions.*' => __('validation.attributes.permission')
        ];
    }
}
