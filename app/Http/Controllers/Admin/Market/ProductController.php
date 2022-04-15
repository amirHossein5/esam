<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Color;
use Illuminate\Http\Request;
use App\Models\AuctionPeriod;
use App\Models\Market\Product;
use App\Models\Market\SellType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use AmirHossein5\LaravelImage\Facades\Image;
use App\Http\Requests\Admin\Market\Product\StoreProductRequest;
use App\Http\Requests\Admin\Market\Product\UpdateProductRequest;
use App\Models\Market\Auction;
use App\Models\Market\ProductAttributeDefaultValue;
use App\Models\Market\ProductAttributeValue;
use App\Models\Market\ProductVariantSelectableAttribute;
use App\Models\Market\ProductWeight;
use App\Services\Admin\Market\ProductVariantSeeder;
use App\Services\Admin\Market\ProductVariantService;
use Mews\Purifier\Facades\Purifier;
use Symfony\Component\HttpFoundation\Response;

use function PHPSTORM_META\map;

class ProductController extends Controller
{
    /**
     * Display a archived listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        if (request()->wantsJson()) {
            return datatables(
                Product::query()
                    ->with('productCategory')
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->onlyTrashed()
                    ->get()
            )->toJson();
        }

        return view('admin.market.product.archive.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return datatables(
                Product::query()
                    ->with('productCategory')
                    ->withExists('auction')
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        return view('admin.market.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = null;
        $productCategory = null;
        $auction_periods = null;
        $sellTypes = null;
        $selectableValues = null;
        $productWeights = null;

        if (request()->has('productCategory')) {
            $productCategory = ProductCategory::with(['attributes.defaultValues', 'selectableValues.selectableAttribute'])
                ->findOrFail(request('productCategory'));

            $selectableValues = collect($productCategory->selectableValues->toArray())
                ->groupBy('selectable_attribute.id')
                ->toArray();

            $sellTypes = SellType::get();
            $auction_periods = AuctionPeriod::get();
            $productWeights = ProductWeight::get();
        } else {
            $productCategories = DB::table('product_categories')->get(['name', 'id']);
        }

        return view('admin.market.product.create', compact('productCategories', 'productCategory', 'sellTypes', 'auction_periods', 'selectableValues', 'productWeights'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $request = $request->validated();

        // prepare product
        $productInputs = collect($request)
            ->only(['name', 'introduction', 'image', 'marketable', 'tags', 'published_at', 'description', 'sell_type_id', 'productCategory_id', 'has_request_for_discount', 'weight_id'])
            ->toArray();

        $productInputs['published_at'] = date('Y-m-d H:i:s', substr($productInputs['published_at'], 0, 10));
        $productInputs['description'] = Purifier::clean($productInputs['description']);
        $productInputs['category_id'] = $productInputs['productCategory_id'];
        $productInputs['user_id'] = 1;
        $productInputs['image'] = Image::make($productInputs['image'])
            ->setExclusiveDirectory('product')
            ->save();

        if (!$productInputs['image']) {
            return $this->imageError();
        }

        /** begin transaction */
        DB::beginTransaction();

        if ($request['deliveryIsFree'] == false) {
            $productInputs['delivery_amount'] = ProductWeight::findOrFail($productInputs['weight_id'])
                ->delivery_amount;
        }

        $product = Product::create($productInputs);
        $productId = $product->id;

        /** attributes */
        if (isset($request['attributeValues'])) {
            foreach ($request['attributeValues'] as $attribute => $value_id) {
                $value = ProductAttributeDefaultValue::findOrFail($value_id);

                $product->attributeValues()->create([
                    'attribute_id' => $attribute,
                    'value_id' => $value_id,
                    'value' => $value->value,
                ]);
            }
        }

        /** fix price or auction */
        $sellType = SellType::findOrFail($request['sell_type_id']);
        $category = ProductCategory::findOrFail($request['productCategory_id']);

        if ($sellType->name == SellType::AUCTION) {
            $request['start_date'] = date('Y-m-d H:i:s', substr($request['start_date'], 0, 10));
            $request['urgent_price'] = isset($request['urgent_price']) ? $request['urgent_price'] : null;
            $request['reserved_price'] = isset($request['reserved_price']) ? $request['reserved_price'] : null;

            Auction::create([
                'product_id' => $product->id,
                'start_date' => $request['start_date'],
                'start_price' => $request['start_price'],
                'period_id' => $request['auction_period_id'],
                'urgent_price' => $request['urgent_price'],
                'reserved_price' => $request['reserved_price'],
            ]);
        } else if ($sellType->name == SellType::FIXPRICE) {

            if ($category->selectableValues()->exists()) {
                foreach ($request['productVariants'] as $variant) {

                    /** insert in product variants */
                    $createdVariant = $product->variants()->create([
                        'marketable_number' => $variant['number'],
                        'price' => $variant['price'],
                        'active' => isset($variant['active']) and $variant['active'] === true
                    ]);

                    $product->load('variants.selectableAttributes');

                    /** product variants selectable attributes */
                    $exists = (new ProductVariantService)
                        ->selectable_attribute_exists($product->variants, $variant);

                    if ($exists) {
                        DB::rollBack();

                        return response(['errors' => [
                            'productVariants' => ['آیتم های تکراری انتخاب شده است.']
                        ]], Response::HTTP_UNPROCESSABLE_ENTITY);
                    }

                    foreach ($variant['items'] as $value) {
                        $createdVariant->selectableAttributes()->create([
                            'attribute_id' => $value['attribute_id'],
                            'value_id' => $value['mainValue'],
                            'value' => $value['value'],
                        ]);
                    }
                }
            } else {
                $product->variants()->create([
                    'marketable_number' => $request['number'],
                    'price' => $request['price'],
                    'active' => 1
                ]);
            }
        }

        DB::commit();

        return response(['message' => ' با موفقیت ساخته شد.', 'id' => $productId], Response::HTTP_CREATED);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->load('variants.selectableAttributes.attribute', 'sellType', 'attributeValues', 'auction');
        $sellTypes = SellType::get();
        $auction_periods = AuctionPeriod::get();
        $productWeights = ProductWeight::get();

        $productCategory = ProductCategory::with(['attributes.defaultValues', 'selectableValues.selectableAttribute'])
            ->findOrFail($product->category_id);
        $selectableValues = collect($productCategory->selectableValues->toArray())
            ->groupBy('selectable_attribute.id')
            ->toArray();

        $jsProductVariants = collect($product->variants->toArray())
            ->map(function ($variant) {
                return [
                    'number' => $variant['marketable_number'],
                    'price' => $variant['price_readable'],
                    'active' => (bool) $variant['active'],
                    'items' => collect($variant['selectable_attributes'])
                        ->map(function ($selectableAttribute) {
                            return [
                                'attribute_id' => $selectableAttribute['attribute_id'],
                                'mainValue' => $selectableAttribute['value_id'],
                                'value' => $selectableAttribute['value'],
                                'label' => $selectableAttribute['attribute']['name']
                            ];
                        })
                ];
            })->toJson();

        return view('admin.market.product.edit', compact('product', 'jsProductVariants', 'productCategory', 'sellTypes', 'auction_periods', 'selectableValues', 'productWeights'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request = $request->validated();

        // prepare product
        $productInputs = collect($request)
            ->only(['name', 'introduction', 'marketable', 'tags', 'published_at', 'description', 'sell_type_id', 'has_request_for_discount', 'weight_id'])
            ->toArray();

        $productInputs['published_at'] = date('Y-m-d H:i:s', substr($productInputs['published_at'], 0, 10));
        $productInputs['description'] = Purifier::clean($productInputs['description']);
        $productInputs['user_id'] = $product->user_id;

        if (isset($request['image'])) {
            $productInputs['image'] = Image::make($request['image'])
                ->setExclusiveDirectory('product')
                ->save();

            if (!$productInputs['image']) {
                return $this->imageError();
            }
        }

        /** begin transaction */
        DB::beginTransaction();

        if (isset($productInputs['image'])) {
            $productImage = $product->image;
        }

        if ($request['deliveryIsFree'] == false) {
            $productInputs['delivery_amount'] = ProductWeight::findOrFail($productInputs['weight_id'])
                ->delivery_amount;
        }

        $product->update($productInputs);
        $productId = $product->id;

        /** attributes */
        if (isset($request['attributeValues'])) {
            $product->attributeValues()->delete();

            foreach ($request['attributeValues'] as $attribute => $value_id) {
                $value = ProductAttributeDefaultValue::findOrFail($value_id);

                $product->attributeValues()->create([
                    'attribute_id' => $attribute,
                    'value_id' => $value_id,
                    'value' => $value->value,
                ]);
            }
        }

        /** fix price or auction */
        $sellType = SellType::findOrFail($request['sell_type_id']);
        $category = ProductCategory::findOrFail($product->category_id);

        if ($product->auction()->exists()) {
            $product->auction()->delete();
        } else {
            $product->variants()->delete();
        }

        if ($sellType->name == SellType::AUCTION) {
            $request['start_date'] = date('Y-m-d H:i:s', substr($request['start_date'], 0, 10));
            $request['urgent_price'] = isset($request['urgent_price']) ? $request['urgent_price'] : null;
            $request['reserved_price'] = isset($request['reserved_price']) ? $request['reserved_price'] : null;

            Auction::create([
                'product_id' => $product->id,
                'start_date' => $request['start_date'],
                'start_price' => $request['start_price'],
                'period_id' => $request['auction_period_id'],
                'urgent_price' => $request['urgent_price'],
                'reserved_price' => $request['reserved_price'],
            ]);
        } else if ($sellType->name == SellType::FIXPRICE) {

            if ($category->selectableValues()->exists()) {
                foreach ($request['productVariants'] as $variant) {

                    /** insert in product variants */
                    $createdVariant = $product->variants()->create([
                        'marketable_number' => $variant['number'],
                        'price' => $variant['price'],
                        'active' => isset($variant['active']) and $variant['active'] === true
                    ]);

                    $product->load('variants.selectableAttributes');

                    /** product variants selectable attributes */
                    $exists = (new ProductVariantService)
                        ->selectable_attribute_exists($product->variants, $variant);

                    if ($exists) {
                        DB::rollBack();

                        if (isset($productInputs['image'])) {
                            Image::rm($productInputs['image']);
                        };

                        return response(['errors' => [
                            'productVariants' => ['آیتم های تکراری انتخاب شده است.']
                        ]], Response::HTTP_UNPROCESSABLE_ENTITY);
                    }

                    foreach ($variant['items'] as $value) {
                        $createdVariant->selectableAttributes()->create([
                            'attribute_id' => $value['attribute_id'],
                            'value_id' => $value['mainValue'],
                            'value' => $value['value'],
                        ]);
                    }
                }
            } else {
                $product->variants()->create([
                    'marketable_number' => $request['number'],
                    'price' => $request['price'],
                    'active' => 1
                ]);
            }
        }

        DB::commit();

        if (isset($productInputs['image'])) {
            Image::rm($productImage);
        }

        return response(['message' => ' با موفقیت ویرایش شد.', 'id' => $productId], Response::HTTP_CREATED);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(int $productId)
    {
        $product = Product::onlyTrashed()->findOrFail($productId);

        $product->restore();

        return to_route('admin.market.product.index')
            ->with('sweetalert-mixin-success', 'با موفقیت بازگردانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('admin.market.product.index')
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(int $productId)
    {
        $product = Product::onlyTrashed()->findOrFail($productId);

        Image::rm($product->image);

        if ($product->gallery()->exists()) {
            $product->gallery->each(function ($image) {
                Image::rm($image);
            });
        }

        $product->forceDelete();

        return to_route('admin.market.product.index')
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function changeMarketable(Product $product)
    {
        $product->marketable = !$product->marketable;

        $product->save();

        return to_route('admin.market.product.index')
            ->with('sweetalert-mixin-success', 'با موفقیت تغییر داده شد');
    }
}
