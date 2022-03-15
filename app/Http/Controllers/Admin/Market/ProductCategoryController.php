<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Market\ProductCategory;
use AmirHossein5\LaravelImage\Facades\Image;
use App\Http\Requests\Admin\Market\ProductCategory\StoreProductCategoryRequest;
use App\Http\Requests\Admin\Market\ProductCategory\UpdateProductCategoryRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function archive()
    {
        if (request()->wantsJson()) {
            return datatables(
                ProductCategory::select('id', 'name', 'image', 'parent_id', 'show_in_menu')
                    ->onlyTrashed()
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->with('trashedParent')
                    ->get()
            )->toJson();
        }

        return view('admin.market.category.archive.index');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return datatables(
                ProductCategory::select('id', 'name', 'image', 'parent_id', 'show_in_menu')
                    ->with('parent:id,name')
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        return view('admin.market.category.index');
    }

    public function create(): View
    {
        $productCategories = DB::table('product_categories')->whereNull('deleted_at')->get(['name', 'id']);

        return view('admin.market.category.create', compact('productCategories'));
    }

    public function store(StoreProductCategoryRequest $request): RedirectResponse
    {
        $inputs = $request->validated();
        $inputs['description'] = Purifier::clean($inputs['description']);

        if ($request->hasFile('image')) {
            $inputs['image'] = Image::make($inputs['image'])
                ->setExclusiveDirectory('product-category')
                ->save();

            if (!$inputs['image']) {
                return $this->imageError();
            }
        }

        ProductCategory::create($inputs);

        return redirect()->route('admin.market.category.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ذخیره شد');
    }

    public function edit(ProductCategory $productCategory): View
    {
        $productCategories = DB::table('product_categories')
            ->whereNull('deleted_at')
            ->get(['name', 'id'])
            ->reject(function ($col) use ($productCategory) {
                return $col->id === $productCategory->id;
            });

        return view('admin.market.category.edit', compact('productCategories', 'productCategory'));
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory): RedirectResponse
    {
        $inputs = $request->validated();
        $inputs['description'] = Purifier::clean($inputs['description']);

        if ($request->hasFile('image')) {
            if ($productCategory->image) {
                if (!Image::rm($productCategory->image)) {
                    return $this->imageError();
                }
            }

            $inputs['image'] = Image::make($inputs['image'])
                ->setExclusiveDirectory('product-category')
                ->save();

            if (!$inputs['image']) {
                return $this->imageError();
            }
        }

        if ($productCategory->allChildren()->exists()) {
            unset($inputs['parent_id']);
        }

        $productCategory->update($inputs);

        return redirect()->route('admin.market.category.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    public function restore(int $id): RedirectResponse
    {
        ProductCategory::onlyTrashed()->where('id', $id)->restore();

        return back()->with('sweetalert-mixin-success', 'با موفقیت بازگردانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return back()->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    public function forceDelete($id): RedirectResponse
    {
        $productCategory = ProductCategory::onlyTrashed()->where('id', $id)->first();

        Image::rm($productCategory->image);

        $productCategory->allChildren->each(function ($category) {
            if ($category->image) {
                Image::rm($category->image);
            }
        });

        $productCategory->forceDelete();

        return back()->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    public function changeShowInMenu(ProductCategory $productCategory): Response
    {
        $productCategory->show_in_menu = !$productCategory->show_in_menu;
        $result = $productCategory->save();

        return $result
            ? response(['checked' => $productCategory->show_in_menu])
            : response('', 500);
    }
}
