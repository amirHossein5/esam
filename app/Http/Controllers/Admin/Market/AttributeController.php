<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AttributeRequest;
use App\Models\Market\ProductAttribute;
use App\Models\Market\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::whereDoesntHave('allChildren')->get(['name', 'id']);

        return view('admin.market.attribute.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::whereDoesntHave('allChildren')->get(['name', 'id']);

        return view('admin.market.attribute.create', compact('productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        $request = $request->validated();

        DB::transaction(function () use ($request) {
            ProductCategory::whereDoesntHave('allChildren')
                ->findOrFail($request['category_id']);

            $attribute = ProductAttribute::create($request);

            $request['values'] = str_replace(',,', ',', $request['values']);

            collect(explode(',', $request['values']))->each(function ($value) use ($attribute) {
                $attribute->defaultValues()->create(['value' => $value]);
            });
        });

        return to_route('admin.market.attribute.create')
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $productCategory = ProductCategory::with('attributes.defaultValues')
            ->findOrFail($request->get('category'));

        return view('admin.market.attribute.show', compact('productCategory'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttribute $attribute, ProductCategory $productCategory)
    {
        $attribute->delete();

        return to_route('admin.market.attribute.show', ['category' => $productCategory->id])
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }
}
