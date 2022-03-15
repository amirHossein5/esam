<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminUserRequest extends FormRequest
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
            'first_name' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui|max:30',
            'last_name' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui|max:30',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->admin->id)],
            'mobile' => ['required', 'digits:11', Rule::unique('users')->ignore($this->admin->id)],
            'profile_photo_path' => 'nullable|image|file|max:1000',
            'role_id' => 'nullable|numeric|exists:roles,id'
        ];
    }
}
