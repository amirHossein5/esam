<?php

namespace App\Http\Requests\Admin\Notify;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
            'subject' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'body' => 'required|string',
            'status' => 'required|numeric|in:0,1',
            'send_at' => 'required|numeric|regex:/^[0-9]{9,}$/u'
        ];
    }
}
