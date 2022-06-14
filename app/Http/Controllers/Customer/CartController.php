<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Market\Product;
use App\Models\Market\ProductVariant;
use App\Services\DiscountService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = auth()->user()->cartItems()->with('product.amazingSale', 'variant.selectableAttributes.attribute')->get();

        return view('customer.cart', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $productId)
    {
        $request = $request->validate([
            'variant_id' => 'required|numeric|exists:product_variants,id',
            'number' => 'required|min:1|numeric',
        ]);

        $product = Product::actives()->findOrFail($productId);
        $variant = ProductVariant::withCount('selectableAttributes')->findOrFail($request['variant_id']);

        if ($variant->product_id != $product->id) {
            return back()
                ->withInput()->withErrors([
                    'variant_id' => 'دوباره امتحان کتید'
                ]);
        }
        if ($variant->marketable_number < $request['number']) {
            return back()
                ->withInput()->withErrors([
                    'number' => $variant->selectable_attributes_count > 0
                        ? 'مشخصه مورد نظر موجود نیست'
                        : 'محصول با تعداد مورد نظر موجود نیست'
                ]);
        }
        if (auth()->user()->cartItems()->whereVariantId($variant->id)->exists()) {
            auth()->user()->cartItems()->whereVariantId($variant->id)->delete();
        }

        auth()->user()->cartItems()->create($request + ['product_id' => $product->id]);

        return to_route('customer.cart.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $userCartItems = auth()->user()->cartItems()->get();
        $expectedIds = collect($userCartItems)
            ->pluck('id')->toArray();

        $request = $request->validate([
            'cartItems.ids' => "required",
            'cartItems.ids.*' => ["required", "numeric", Rule::in($expectedIds)],
            'cartItems.number' => 'required',
            'cartItems.number.*' => 'required|min:1|numeric',
        ], [], [
            'cartItems.ids.*' => 'کالا',
            'cartItems.number.*' => 'تعداد',
        ]);

        if (count($request['cartItems']['ids']) != count($request['cartItems']['number'])) {
            return back()
                ->withInput()
                ->withErrors([
                    'swal-error' => 'مشکلی پیش آمده دوباره امتحان کنید'
                ]);
        }

        // send error to not sent cart items
        $ids = collect($request)->pluck('ids')->flatten()->toArray();
        $withErrors = [];

        collect($userCartItems)
            ->reject(fn ($item) => in_array($item->id, $ids))
            ->each(function ($item) use (&$withErrors) {
                $withErrors['cartItems.ids.' . $item->id] = 'دوباره امتحان کنید';
            });

        if ($withErrors) {
            return back()
                ->withInput()
                ->withErrors($withErrors);
        }

        foreach (array_combine($request['cartItems']['ids'], $request['cartItems']['number']) as $cartItemId => $number) {
            $cartItem = auth()->user()->cartItems()->findOrFail($cartItemId);
            $cartItem->variant->loadCount('selectableAttributes');

            if ($cartItem->variant->marketable_number < $number) {
                return back()
                    ->withInput()->withErrors([
                        'cartItems.number.' . $cartItemId => $cartItem->variant->selectable_attributes_count > 0
                            ? 'مشخصه مورد نظر موجود نیست'
                            : 'محصول با تعداد مورد نظر موجود نیست'
                    ]);
            }

            if (!$cartItem->product->isActive or $cartItem->product->disabled_for_report == Product::DISABLE_FOR_REPORT) {
                $cartItem->delete();
            } elseif ($cartItem->variant->product_id != $cartItem->product->id) {
                $cartItem->delete();
            } else {
                $cartItem->update([
                    'number' => $number
                ]);
            }
        }

        return to_route('customer.cart.index')
            ->with('sweetalert-mixin-success', 'با موفقیت بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartItem $cartItem)
    {
        $cartItem = auth()->user()->cartItems()->findOrFail($cartItem->id);
        
        $cartItem->delete();

        return back()
            ->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }
}
