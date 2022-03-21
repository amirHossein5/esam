<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class FAQRequest extends FormRequest
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
            'faq_category_id' => 'required|numeric|exists:faq_categories,id',
            'question' => 'required|string|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'status' => 'required|numeric|in:0,1',
            'answer' => 'required|string'
        ];
    }
}
