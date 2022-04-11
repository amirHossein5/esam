<?php

namespace App\Http\Requests\Admin\Market\Discount;

use App\Models\Market\Copan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CopanRequest extends FormRequest
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
            'code' => 'required|string|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'amount' => 'required|numeric',
            'amount_type' => ['required', Rule::in(Copan::PERCENTAGE, Copan::PRICEUNIT)],
            'discount_ceiling' => Rule::when($this->amount_type == Copan::PERCENTAGE, 'required|numeric|min:1'),
            'type' => ['required', Rule::in(Copan::PRIVATE, Copan::PUBLIC)],
            'user_id' => [Rule::when($this->type == Copan::PRIVATE, ['required', 'exists:users,id'])],
            'start_date' => 'required|numeric|regex:/^[0-9]+$/u',
            'end_date' => 'required|numeric|regex:/^[0-9]+$/u',
        ];
    }

    public function attributes(): array
    {
        return [
            'type' => __('validation.attributes.discount_type')
        ];
    }
}
