<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AmazingSaleRequest extends FormRequest
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
        $auctionProductIds = DB::table('auctions')->get(['product_id', 'id'])->pluck('product_id')->toArray();

        return [
            'product_id' => ["required", Rule::notIn($auctionProductIds), 'numeric', Rule::unique('amazing_sales', 'product_id')->ignore($this->amazingSale?->id), 'exists:products,id'],
            'percentage' => 'required|numeric|min:1|max:100',
            'start_date' => 'required|numeric|regex:/^[0-9]+$/u',
            'end_date' => 'required|numeric|regex:/^[0-9]+$/u',
        ];
    }
}
