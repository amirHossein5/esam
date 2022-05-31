@extends('customer.layouts.master')

@section('head-tag')
    <title>
        فاکتور سفارش
    </title>
@endsection

@section('content')
    <section>
        <x-customer.dashboard.header-text>
             فاکتور سفارش

            <x-button class="mr-4 bg-green-600 rounded tracking-normal" id="print">
                <i class="icofont-print ml-2"></i>
                پرینت
            </x-button>
        </x-customer.dashboard.header-text>

        <section id="printContent">
            <section class="flex md:flex-row flex-col gap-5 mt-4">
                <section class="md:w-9/12">
                    <section class=" rounded-md shadow-md bg-white border p-3">

                        <section class="p-3">

                            <section>
                                <table class="table">
                                    <thead>
                                        <th>نام محصول</th>
                                        <th>تخفیف</th>
                                        <th>تعداد</th>
                                        <th>مبلغ محصول</th>
                                        <th>مبلغ محصول ( بدون تخفیف و با احتساب تعداد)</th>
                                        <th>مشخصه ها</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->items as $item)
                                            <tr>
                                                <td>
                                                    <span class="text-base">{{ strlimit($item->product_object->name ?? '-', 30) }}</span>
                                                </td>
                                                <td>
                                                    @if ($item->amazing_sale_object)
                                                        <span class="text-base">
                                                            {{ fa_price($item->amazing_sale_discount_amount * $item->number) }}
                                                        </span>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="text-base">{{ $item->number }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-base">{{ fa_price($item->variant_object->price) }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-base">{{ fa_price($item->variant_object->price * $item->number) }}</span>
                                                </td>
                                                <td>
                                                    @if ($item->variant_object->selectable_attributes ?? null)
                                                        @foreach ($item->variant_object->selectable_attributes as $value)
                                                             - {{ $value->attribute->name }}: {{ $value->value }} <br>
                                                        @endforeach
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <section class="mt-10">
                                    آدرس: {{ $order->address_object->address ?? '-' }}
                                </section>
                                <section class="mt-2">
                                    گیرنده: {{ $order->address_object->recipient_first_name .' '. $order->address_object->recipient_last_name }}
                                </section>
                                <section class="mt-2">
                                    شماره موبایل گیرنده: <span class="text-base">{{ $order->address_object->mobile ?? '-' }}</span>
                                </section>
                            </section>

                        </section>

                    </section>
                </section>

                <section class="md:w-3/12">
                    <section class="sticky p-5 bg-white border rounded-md shadow-lg top-7">
                        <section class="flex flex-col gap-5">
                            <div class="flex flex-wrap justify-between">
                                <p class="text-gray-600">قیمت کالاها ({{ $order->items->sum('number') }})</p>
                                <p><span class="text-lg">{{ fa_price($order->order_final_amount) }}</span> تومان</p>
                            </div>

                            @if ($order->order_discount_amount)
                                <div class="flex flex-wrap justify-between">
                                    <p class="text-gray-600">تخفیف کالاها</p>
                                    <p class="text-red-600"><span class="text-lg">{{ fa_price($order->order_discount_amount) }}</span> تومان</p>
                                </div>
                            @endif

                            <div class="flex flex-wrap justify-between">
                                <p class="text-gray-600">هزینه ارسال</p>
                                <p><span class="text-lg">{{ fa_price($order->delivery_amount) }}</span> تومان</p>
                            </div>
                        </section>

                        <hr class="my-5">

                        <div class="flex flex-wrap justify-between">
                            <p class="text-gray-600">جمع سبد خرید</p>
                            <p><span class="text-lg">{{ fa_price(($order->order_final_amount - $order->order_discount_amount) + $order->delivery_amount) }}</span> تومان</p>
                        </div>

                        @if ($order->copan_object)
                            @php
                                $copanDiscountAmount = 0;

                                if ($order->copan_object->amount_type === App\Models\Market\Copan::PRICEUNIT) {
                                    $copanDiscountAmount = $order->copan_object->amount;
                                } elseif ($order->copan_object->amount_type === App\Models\Market\Copan::PERCENTAGE) {
                                    $copanDiscountAmount = (new App\Services\DiscountService)
                                        ->getDiscount(
                                            amount: $order->order_final_amount,
                                            percentage: $order->copan_object->amount,
                                            ceil: $order->copan_object->discount_ceiling
                                        );
                                }
                            @endphp

                            <hr class="my-5">
                            <section class="flex flex-col gap-5">
                                <div class="flex flex-wrap justify-between">
                                    <p class="text-gray-600">کد تخفیف</p>
                                    <p class="text-red-600"><span class="text-lg">{{ fa_price($copanDiscountAmount) }}</span> تومان</p>
                                </div>

                                <div class="flex flex-wrap justify-between">
                                    <p class="text-gray-600">قیمت نهایی</p>
                                    <p><span class="text-lg">
                                        {{ fa_price(($order->order_final_amount - ($order->order_discount_amount + $order->order_copan_discount_amount)) + $order->delivery_amount)}}
                                        </span> تومان</p>
                                </div>
                            </section>
                        @endif
                    </section>
                </section>
            </section>
        </section>
    </section>
@endsection

@section('scripts')
    <script>
        var printBtn = document.getElementById('print');
        printBtn.addEventListener('click', function() {
            printContent('printContent');
        })


        function printContent(el) {
            var restorePage = $('body').html();
            var printContent = $('#' + el).clone();
            $('body').empty().html(printContent);
            window.print();
            $('body').html(restorePage);
        }
    </script>
@endsection
