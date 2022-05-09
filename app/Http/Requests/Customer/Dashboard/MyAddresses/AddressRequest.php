<?php

namespace App\Http\Requests\Customer\Dashboard\MyAddresses;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'province_id' => 'required|integer|exists:provinces,id',
            'city_id' => 'required|integer|exists:cities,id',
            'address' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'postal_code' => 'required|numeric',
            'no' => 'nullable|numeric',
            'unit' => 'nullable|numeric',
            'recipient_first_name' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui', 'recipient_last_name' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'mobile' => 'required|numeric'
        ];
    }
}
