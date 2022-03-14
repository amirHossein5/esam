<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;
use AmirHossein5\LaravelImage\Facades\Image;
use App\Http\Requests\Admin\Market\Product\StoreProductRequest;
use App\Models\AttributeValue;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use App\Services\AttributeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        if (request()->wantsJson()) {
            return datatables(
                Product::select('id', 'name', 'image', 'price', 'category_id')
                    ->onlyTrashed()
                    ->with('category')
                    ->skip(request()->start)
                    ->take(request()->length)
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
                Product::select('id', 'name', 'image', 'price', 'category_id')
                    ->with('category')
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        return view('admin.market.product.index');
    }

    public function show(Product $product): View
    {
        return view('admin.market.product.show');
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
        $brands = null;

        if (!request()->has('productCategory')) {
            $productCategories = ProductCategory::get(['name', 'id']);
        } else {
            $productCategory = ProductCategory::with(
                'attributes.attribute_field',
                'attributes.default_values.attributes.attribute_field'
            )->findOrFail(request()->get('productCategory'));

            $brands = Brand::get(['persian_name', 'id']);
        }
        return view('admin.market.product.create', compact('productCategories', 'productCategory', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $inputs = $request->validated();

        $inputs['published_at'] = date('Y-m-d H:i:s', substr($inputs['published_at'], 0, 10));
        $inputs['introduction'] = Purifier::clean($inputs['introduction']);

        if ($request->hasFile('image')) {
            $inputs['image'] = Image::make($inputs['image'])
                ->setExclusiveDirectory('products')
                ->save();

            if (!$inputs['image']) {
                return $this->imageError();
            }
        }

        DB::transaction(function () use ($inputs) {
            $product = Product::create($inputs + ['category_id' => $inputs['productCategory_id']]);

            // saveing values
            collect(request('attributes'))->each(function ($attribute) use ($product, $inputs) {
                $data = $inputs['attribute_values'][$attribute->id];

                if (is_array($data) and $attribute->default_values->isEmpty()) {
                    foreach (array_combine($data['options'], $data['priceIncrease']) as $value => $price) {
                        $product->attribute_values()->create([
                            'value' => ['value' => $value, 'priceIncrease' => $price],
                            'attribute_id' => $attribute->id
                        ]);
                    }

                } else {
                    $product->attribute_values()->create([
                        'value' => $data,
                        'attribute_id' => $attribute->id
                    ]);
                }
            });
            
            foreach (array_combine($inputs['productColors'], $inputs['productColorsPriceIncrease']) as $color => $price) {
                $product->colors()->create([
                    'color_name' => $color,
                    'price_increase' => $price
                ]);
            }
        });

        return redirect()->route('admin.market.product.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ذخیره شد');
    }

    public function restore(int $id): RedirectResponse
    {
        Product::onlyTrashed()->findOrFail($id)->restore();

        return back()->with('sweetalert-mixin-success', 'با موفقیت بازگردانی شد');
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

        return back()->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(int $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);

        Image::rm($product->image);

        $product->forceDelete();

        return back()->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }
}
