<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\CashPayment;
use App\Models\Market\Copan;
use App\Models\Market\Order;
use App\Models\Market\OrderItem;
use App\Models\Market\Payment;
use App\Models\Market\PaymentType;
use App\Models\Market\Product;
use App\Services\DiscountService;
use Facades\App\Repositories\ProvinceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function address()
    {
        $addresses = auth()->user()->addresses;
        $provinces = ProvinceRepository::all();

        return view('customer.payment.address', compact('addresses', 'provinces'));
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editAddress(Address $address)
    {
        if ($address->user_id !== auth()->id()) {
            abort(403);
        }

        session()->put('url.intended', route('customer.payment.address'));

        return to_route('customer.dashboard.myAddresses.edit', $address->id);
    }

    /**
     * Register copan page.
     *
     * @return \Illuminate\Http\Response
     */
    public function code(Address $address)
    {
        if ($address->user_id != auth()->id()) {
            abort(404);
        }

        return view('customer.payment.code', compact('address'));
    }

    /**
     * Registers copan.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerCode(Request $request, Address $address)
    {
        $request = $request->validate([
            'code' => 'required|string'
        ]);

        $copan = Copan::actives()->whereCode($request['code'])->first();

        if (!$copan) {
            return back()->withInput()
                ->withErrors([
                    'code' => ' کد یافت نشد.'
                ]);
        }
        if ($copan->type === Copan::PRIVATE and $copan->user_id != auth()->id()) {
            return back()->withInput()
                ->withErrors([
                    'code' => ' کد یافت نشد.'
                ]);
        }
        if (auth()->user()->usedCopans()->whereCopanId($copan->id)->exists()) {
            return back()->withInput()
                ->withErrors([
                    'code' => 'شما این کد را قبلا استفاده کرده اید.'
                ]);
        }

        return to_route('customer.payment.payPage', [$address->id, $copan->id])
            ->with('sweetalert-mixin-success', 'با موفقیت کد تخفیف اعمال شد');
    }

    /**
     * Payment ways page.
     *
     * @param \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function payPage(Address $address, $copanId = null)
    {
        $copan = Copan::actives()->find($copanId);

        return view('customer.payment.pay', compact('address', 'copan'));
    }

    /**
     * Pay and store new order.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request, Address $address, $copanId = null)
    {
        if ($address->user_id !== auth()->id()) {
            abort(403);
        }

        $request = $request->validate([
            'pay-type' => 'required|in:cash,online-payment'
        ], [
            'pay-type.required' => 'یک روش پرداخت را انتخاب کنید.'
        ]);

        DB::beginTransaction();

        // calculate amounts
        $cartItems = auth()->user()->cartItems()->with('product.amazingSale', 'variant.selectableAttributes.attribute')->get();
        $totalAmount = 0;
        $totalDiscountAmount = 0;
        $totalDeliveryAmount = 0;
        $finalAmount = 0;

        $cartItems->map(function ($item) use (&$finalAmount, &$totalAmount, &$totalDeliveryAmount, &$totalDiscountAmount) {
            $totalAmount += $item->variant->price * $item->number;
            $totalDeliveryAmount += $item->product->delivery_amount;

            if ($item->product->amazingSale?->isActive) {
                $discountService = (new DiscountService);

                $totalDiscountAmount += $discountService->getDiscount(
                    $item->variant->price,
                    $item->product->amazingSale->percentage
                ) * $item->number;
                $finalAmount += $discountService->calculate(
                    $item->variant->price,
                    $item->product->amazingSale->percentage
                ) * $item->number;
            } else {
                $finalAmount += $item->variant->price * $item->number;
            }
        });

        $finalAmount += $totalDeliveryAmount;
        $copanDiscountAmount = 0;
        $copan = null;

        if ($copanId) {
            $copan = Copan::actives()->whereId($copanId)->first();

            if (!$copan) {
                return back()->withInput()
                    ->withErrors([
                        'code' => ' کد یافت نشد.'
                    ]);
            }
            if ($copan->type === Copan::PRIVATE and $copan->user_id != auth()->id()) {
                return back()->withInput()
                    ->withErrors([
                        'code' => ' کد یافت نشد.'
                    ]);
            }
            if (auth()->user()->usedCopans()->whereCopanId($copan->id)->exists()) {
                return back()->withInput()
                    ->withErrors([
                        'code' => 'شما این کد را قبلا استفاده کرده اید.'
                    ]);
            }

            if ($copan->amount_type === Copan::PRICEUNIT) {
                $copanDiscountAmount = $copan->amount;
            } elseif ($copan->amount_type === Copan::PERCENTAGE) {
                $copanDiscountAmount = (new DiscountService)
                    ->getDiscount(
                        amount: $finalAmount,
                        percentage: $copan->amount,
                        ceil: $copan->discount_ceiling
                    );
            }
        }

        if ($request['pay-type'] == 'cash' and auth()->user()->cash < $finalAmount - $copanDiscountAmount) {
            return back()->withInput()
                ->withErrors([
                    'cash' => 'موجودی کافی نیست.'
                ]);
        }

        // check address
        if (auth()->id() != $address->user_id) {
            abort(404);
        }

        // check products
        $cartItems = auth()->user()->cartItems()->with('variant')->get();

        if ($cartItems->isEmpty()) {
            return back()
                ->with('sweetalert-danger', "سبد خرید خالی است");
        }

        foreach ($cartItems as $cartItem) {
            $cartItem->variant->loadCount('selectableAttributes');

            if ($cartItem->variant->marketable_number < $cartItem->number) {
                return to_route('customer.cart.index')
                    ->withInput()->withErrors([
                        'cartItems.number.' . $cartItem->id => $cartItem->variant->selectable_attributes_count > 0
                            ? 'مشخصه مورد نظر موجود نیست'
                            : 'محصول با تعداد مورد نظر موجود نیست'
                    ]);
            }

            if (!$cartItem->product->isActive or $cartItem->product->disabled_for_report == Product::DISABLE_FOR_REPORT) {
                return back()
                    ->with('sweetalert-danger', "محصول {$cartItem->product->name} فعال نیست. از سبد خرید حذف و دوباره امتحان کنید.");
            }
            if ($cartItem->variant->product_id != $cartItem->product->id) {
                return back()
                    ->with('sweetalert-danger', "مشکلی پیش آمده دوباره سبد خرید را چک کنید.");
            }
        }

        // increase frozen_number decease marketable_number
        foreach ($cartItems as $cartItem) {
            $cartItem->variant->frozenNumber()->create([
                'number' => $cartItem->number,
                'cart_item_id' => $cartItem->id
            ]);
            $cartItem->variant->marketable_number -= $cartItem->number;
            $cartItem->variant->save();
        }

        // create payment
        $amount = $finalAmount >= $copan?->amount
            ? $finalAmount - $copanDiscountAmount
            : 0;

        $cashPayment = CashPayment::create([
            'user_id' => auth()->id(),
            'amount' => $amount,
            'pay_date' => now()->toDateTimeString()
        ]);
        $payment = auth()->user()->payments()->create([
            'amount' => $amount,
            'status' => Payment::PAID,
            'type_id' => PaymentType::whereName('cash')->value('id'),
            'paymentable_type' => CashPayment::class,
            'paymentable_id' => $cashPayment->id,
        ]);

        // create order
        $order = auth()->user()->orders()->create([
            'address_id' => $address->id,
            'address_object' => $address,
            'payment_id' => $payment->id,
            'payment_object' => $payment,
            'delivery_amount' => $totalDeliveryAmount,
            'delivery_status' => Order::NOTSENT,
            'order_final_amount' => $totalAmount,
            'order_discount_amount' => $totalDiscountAmount,
            'copan_id' => $copan?->id,
            'copan_object' => $copan,
            'order_copan_discount_amount' => $copanDiscountAmount,
            'order_status' => Order::ACCEPTED,
        ]);

        // create order items
        foreach($cartItems as $cartItem) {
            $amazingSaleDiscountAmount = null;
            $finalProductPrice = null;

            if ($cartItem->product->amazingSale?->isActive) {
                $amazingSaleDiscountAmount = (new DiscountService)->getDiscount(
                    $cartItem->variant->price,
                    $cartItem->product->amazingSale->percentage
                );
                $finalProductPrice = (new DiscountService)->calculate(
                    $cartItem->variant->price,
                    $cartItem->product->amazingSale->percentage
                );
            } else {
                $finalProductPrice = $cartItem->variant->price;
            }

            $order->items()->create([
                'product_id' => $cartItem->product->id,
                'product_object' => $cartItem->product,
                'delivery_time' => $cartItem->product->user->deliveryTime->time,
                'amazing_sale_id' => $cartItem->product->amazingSale?->isActive ? $cartItem->product->amazingSale->id : null,
                'amazing_sale_object' => $cartItem->product->amazingSale?->isActive ? $cartItem->product->amazingSale : null,
                'amazing_sale_discount_amount' => $amazingSaleDiscountAmount,
                'number' => $cartItem->number,
                'final_product_price' => $finalProductPrice,
                'final_total_price' => $cartItem->number * $finalProductPrice,
                'variant_id' => $cartItem->variant->id,
                'variant_object' => $cartItem->variant->load('selectableAttributes.attribute'),
            ]);
        }

        // decrease cash and frozen_number add sold_number remove cart
        auth()->user()->cash = auth()->user()->cash - $amount;
        auth()->user()->save();

        foreach ($cartItems as $cartItem) {
            $cartItem->variant->frozenNumber()->where('cart_item_id', $cartItem->id)->delete();
            $cartItem->variant->sold_number += $cartItem->number;
            $cartItem->variant->save();
        }

        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }

        if ($copan) {
            auth()->user()->usedCopans()->create([
                'copan_id' => $copan->id
            ]);
        }

        DB::commit();

        return to_route('customer.payment.result', $order->id);
    }

    /**
     * Order result page
     *
     * @param \App\Models\Market\Order $order
     * @return \Illuminate\Http\Response
     */
    public function result(Order $order)
    {
        $order->load('items');

        return view('customer.payment.result', compact('order'));
    }
}
