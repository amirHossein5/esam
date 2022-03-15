<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'body' => 'required|string',
            'status' => 'required|numeric|in:0,1',
            'tags' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,]+$/ui',
            'slug' => 'required|max:20'
        ];
    }
}
