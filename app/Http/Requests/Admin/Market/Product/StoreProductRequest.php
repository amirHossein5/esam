<?php

namespace App\Http\Requests\Admin\Market\Product;

use App\Models\Market\SellType;
use Illuminate\Validation\Rule;
use App\Models\Market\ProductCategory;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Admin\Market\ProductMetasRule;
use App\Rules\Admin\Market\AttributeValueRule;

class StoreProductRequest extends FormRequest
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
        $productCategory = ProductCategory::with(['attributes.defaultValues', 'selectableMetas'])
            ->findOrFail($this->productCategory_id);

        $sellType = SellType::findOrFail(request('sell_type_id'));
        $isAuction = $sellType->name == SellType::AUCTION;
        $hasProductMetas = $productCategory->colorable or $productCategory->selectableMetas->isNotEmpty();

        return [
            'productCategory_id' => 'required|numeric|exists:product_categories,id',

            'name' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'introduction' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'image' => 'required|image|file|max:1000',
            'marketable' => 'required|numeric|in:0,1',
            'tags' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'published_at' => 'required|numeric',
            'description' => 'required|string',

            'attributeValues' => new AttributeValueRule(request('attributeValues'), $productCategory),

            'sell_type_id' => 'required|numeric|exists:sell_types,id',

            // fix_price
            'has_request_for_discount' => Rule::when(!$isAuction, 'required|numeric|in:0,1'),
            'productMetas' => Rule::when(
                !$isAuction and $hasProductMetas,
                [new ProductMetasRule(request('productMetas'), $productCategory)]
            ),
            'number' => Rule::when(!$isAuction and !$hasProductMetas, 'required|integer|min:1'),
            'price' => Rule::when(!$isAuction and !$hasProductMetas, 'required|numeric|min:1'),

            // auction
            'start_price' => Rule::when($isAuction, 'required|numeric|min:1'),
            'auction_period_id' => Rule::when($isAuction, 'required|integer|exists:auction_periods,id'),
            'start_date' => Rule::when($isAuction, 'required|numeric'),
            'urgent_price' => Rule::when($isAuction, 'nullable|numeric|min:1'),
            'reserved_price' => Rule::when($isAuction, 'nullable|numeric|min:1'),
        ];
    }
}
