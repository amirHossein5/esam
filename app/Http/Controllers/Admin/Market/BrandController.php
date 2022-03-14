<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\View\View;
use App\Models\Market\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use AmirHossein5\LaravelImage\Facades\Image;
use App\Http\Requests\Admin\Market\Brand\StoreBrandRequest;
use App\Http\Requests\Admin\Market\Brand\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return datatables(
                Brand::select('id', 'persian_name', 'original_name', 'logo', 'status')
                    ->skip(request()->start)
                    ->take(request()->length)
                    ->get()
            )->toJson();
        }

        return view('admin.market.brand.index');
    }

    public function create(): View
    {
        return view('admin.market.brand.create');
    }

    public function store(StoreBrandRequest $request): RedirectResponse
    {
        $inputs = $request->validated();

        if ($request->hasFile('logo')) {
            $inputs['logo'] = Image::make($inputs['logo'])
                ->setExclusiveDirectory('brand')
                ->save();

            if (!$inputs['logo']) {
                return $this->imageError();
            }
        }

        Brand::create($inputs);

        return redirect()->route('admin.market.brand.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ذخیره شد');
    }

    public function edit(Brand $brand): View
    {
        return view('admin.market.brand.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand): RedirectResponse
    {
        $inputs = $request->validated();

        if ($request->hasFile('logo')) {
            if ($brand->logo) {
                if (!Image::rm($brand->logo)) {
                    return $this->imageError();
                }
            }

            $inputs['logo'] = Image::make($inputs['logo'])
                ->setExclusiveDirectory('brand')
                ->save();

            if (!$inputs['logo']) {
                return $this->imageError();
            }
        }

        $brand->update($inputs);

        return redirect()->route('admin.market.brand.index')
            ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }

    public function changeStatus(Brand $brand): Response
    {
        $brand->status = !$brand->status;
        $result = $brand->save();

        return $result
            ? response(['checked' => $brand->status])
            : response('', 500);
    }
}
