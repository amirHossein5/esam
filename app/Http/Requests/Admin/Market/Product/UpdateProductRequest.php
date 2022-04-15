<?php

namespace App\Http\Requests\Admin\Market\Product;

use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use App\Models\Market\SellType;
use App\Rules\Admin\Market\AttributeValueRule;
use App\Rules\Admin\Market\ProductVariantsRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
        $productCategory = ProductCategory::with(['attributes.defaultValues', 'selectableValues.selectableAttribute'])
            ->findOrFail($this->product->category_id);

        $sellType = SellType::findOrFail(request('sell_type_id'));
        $isAuction = $sellType->name == SellType::AUCTION;
        $hasSelectableAttributes = $productCategory->selectableValues()->exists();

        return [
            'name' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'introduction' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'image' => 'nullable|image|file|max:1000',
            'marketable' => 'required|numeric|in:0,1',
            'tags' => 'required|regex:/^[\w\-\.۰−۹آ-یء ,\?\؟]+$/ui',
            'published_at' => 'required|numeric',
            'description' => 'required|string',

            'attributeValues' => new AttributeValueRule(request('attributeValues'), $productCategory),

            'sell_type_id' => 'required|numeric|exists:sell_types,id',

            // fix_price
            'number' => Rule::when(!$isAuction and !$hasSelectableAttributes, 'required|integer|min:1|max:100'),
            'price' => Rule::when(!$isAuction and !$hasSelectableAttributes, 'required|numeric|min:1'),
            'has_request_for_discount' => Rule::when(!$isAuction, 'required|numeric|in:0,1'),
            'productVariants' => Rule::when(
                !$isAuction and $hasSelectableAttributes,
                [new ProductVariantsRule($productCategory)]
            ),

            // auction
            'start_price' => Rule::when($isAuction, 'required|numeric|min:1'),
            'auction_period_id' => Rule::when($isAuction, 'required|integer|exists:auction_periods,id'),
            'start_date' => Rule::when($isAuction, 'required|numeric'),
            'urgent_price' => Rule::when($isAuction, 'sometimes|required|numeric|min:1'),
            'reserved_price' => Rule::when($isAuction, 'sometimes|required|numeric|min:1'),

            // delivery
            'weight_id' => 'required|numeric|exists:product_weights,id',
            'deliveryIsFree' => 'required|numeric|in:0,1',
        ];
    }
}
