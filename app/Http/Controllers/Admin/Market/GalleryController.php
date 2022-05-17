<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\View\View;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use AmirHossein5\LaravelImage\Facades\Image;
use App\Http\Requests\Admin\Market\Product\GalleryRequest;
use App\Models\Market\ProductImage;

class GalleryController extends Controller
{
    public function index(Product $product): View
    {
        $product->load('galleries');

        return view('admin.market.product.gallery.index', compact('product'));
    }

    public function store(GalleryRequest $request, Product $product): RedirectResponse
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $uploadedImage) {
                $image = Image::make($uploadedImage)
                    ->setExclusiveDirectory('product')
                    ->autoResize()
                    ->save();

                if (!$image) {
                    return $this->imageError();
                }

                $product->galleries()->create(['image' => $image]);
            }
        }

        return redirect()
            ->route('admin.market.product.gallery.index', $product->id)
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد');
    }

    public function destroy(Product $product, ProductImage $gallery): RedirectResponse
    {
        Image::rm($gallery->image);

        $gallery->delete();

        return redirect()
            ->route('admin.market.product.gallery.index', $product->id)
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }
}
