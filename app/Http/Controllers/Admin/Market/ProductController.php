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
use App\Models\Market\Auction;
use App\Models\Market\ProductAttributeValue;
use Mews\Purifier\Facades\Purifier;
use Symfony\Component\HttpFoundation\Response;

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
        $productCategories = DB::table('product_categories')->get(['name', 'id']);
        $productCategory = null;
        $colors = null;
        $auction_periods = null;
        $sellTypes = null;

        if (request()->has('productCategory')) {
            $productCategory = ProductCategory::with(['attributes.defaultValues', 'selectableMetas'])
                ->findOrFail(request('productCategory'));
            $colors = Color::get();
            $sellTypes = SellType::get();
            $auction_periods = AuctionPeriod::get();
        }

        return view('admin.market.product.create', compact('productCategories', 'productCategory', 'colors', 'sellTypes', 'auction_periods'));
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
            ->only(['name', 'introduction', 'image', 'marketable', 'tags', 'published_at', 'description', 'sell_type_id', 'productCategory_id'])
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
        dd($productInputs, $request);
        DB::transaction(function () use ($productInputs, $request) {
            $product = Product::create($productInputs);

            /** attributes */
            foreach ($request['attributeValues'] as $attribute => $value) {
                $product->attributeValues()->create([
                    'attribute_id' => $attribute,
                    'value_id' => $value,
                ]);
            }

            /** fix price or auction */
            $sellType = SellType::findOrFail($request['sell_type_id']);
            $category = ProductCategory::findOrFail($request['productCategory_id']);

            if ($sellType->name == SellType::AUCTION) {
                $request['start_date'] = date('Y-m-d H:i:s', substr($request['start_date'], 0, 10));
                
                Auction::create([
                    'product_id' => $product->id,
                    'start_price' => $request['start_price'],
                    'reserved_price' => $request['reserved_price'],
                    'urgent_price' => $request['urgent_price'],
                    'start_date' => $request['start_date'],
                    'period_id' => $request['period_id'],
                ]);
            } else if ($sellType->name == SellType::FIXPRICE) {

                /** just can submit multiple color */
                if ($category->colorable and !$category->selectableMetas()->exists()) {

                }

                /** just has selectable meta */
                if (!$category->colorable and $category->selectableMetas()->exists()) {

                }

                /** both exists */
                if ($category->colorable and $category->selectableMetas()->exists()) {

                }

                /** without multiple submitted */
                if (!$category->colorable and !$category->selectableMetas()->exists()) {

                }
            }
        });

        return response(['message' => ' با موفقیت ساخته شد.'], Response::HTTP_CREATED);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
