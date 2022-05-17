<?php

namespace App\Http\Controllers\Customer\Dashboard;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\ProductImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use AmirHossein5\LaravelImage\Facades\Image;
use App\Http\Requests\Admin\Market\Product\GalleryRequest;
use Illuminate\View\View;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product): View
    {
        $product->load('galleries');

        return view('customer.dashboard.products.gallery.index', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            ->route('customer.dashboard.products.gallery.index', $product->id)
            ->with('sweetalert-mixin-success', 'با موفقیت ساخته شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductImage $gallery): RedirectResponse
    {
        Image::rm($gallery->image);

        $gallery->delete();

        return redirect()
            ->route('customer.dashboard.products.gallery.index', $product->id)
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }
}
