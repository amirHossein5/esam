<?php

namespace App\Http\Requests\Admin\Notify;

use Illuminate\Foundation\Http\FormRequest;

class EmailFileRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            return [
                'file_name' => 'required|regex:/^[\w\-\.۰−۹آ-یء,\?\؟]+$/ui',
                'file' => 'required|string'
            ];
        } else if ($this->method() == 'PUT') {
            return [
                'file_name' => 'required|regex:/^[\w\-\.۰−۹آ-یء,\?\؟]+$/ui',
            ];
        }
    }

    public function prepareForValidation()
    {
        $this->merge([
            'file' => preg_replace('/<.+/si', '', request('emailFile'))
        ]);
    }
}
