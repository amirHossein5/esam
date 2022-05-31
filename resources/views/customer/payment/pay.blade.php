@extends('customer.layouts.master')

@section('head-tag')
    <title>
         پرداخت
    </title>
@endsection

@section('content')
    <section>
        <x-customer.dashboard.header-text>
            پرداخت
        </x-customer.dashboard.header-text>

        <section class="flex md:flex-row flex-col gap-5 mt-4">
            <section class="md:w-9/12">
                <section class=" rounded-md shadow-md bg-white border p-3">

                    <section class="p-3">

                        <section>
                            <form action="{{ route('customer.payment.payPage', [$address->id, $copan?->id]) }}" method="post">
                                @csrf
                                <input class="hidden" type="radio" name="pay-type" id="cash" value="cash" >
                                <input class="hidden" type="radio" name="pay-type" id="online-payment" value="online-payment" disabled>

                                <x-label for="online-payment" class="border p-2 rounded opacity-50">پرداخت بصورت آنلاین</x-label>
                                <x-label for="cash" class="border p-2 rounded hover:bg-green-100 cursor-pointer click-bg-green-200">
                                    پرداخت از کیف پول ({{ auth()->user()->cash_readable }})
                                </x-label>

                                @error('pay-type')
                                    <section class="error">
                                        {{ $message }}
                                    </section>
                                @enderror
                                @error('code')
                                    <section class="error">
                                        {{ $message }}
                                    </section>
                                @enderror
                                @error('cash')
                                    <section class="error">
                                        {{ $message }}
                                    </section>
                                @enderror

                                <section class="flex justify-center">
                                    <x-button class="!bg-green-600 tracking-normal w-1/2 flex justify-center complete-payment">پرداخت</x-button>
                                </section>
                            </form>
                        </section>

                    </section>

                </section>
            </section>

            <section class="md:w-3/12">
                <section class="sticky p-5 bg-white border rounded-md shadow-lg top-7">
                    <section class="flex flex-col gap-5">
                        <div class="flex flex-wrap justify-between">
                            <p class="text-gray-600">قیمت کالاها ({{ $totalProductNumber }})</p>
                            <p><span class="text-lg">{{ fa_price($totalAmount) }}</span> تومان</p>
                        </div>

                        @if ($totalDiscountAmount)
                            <div class="flex flex-wrap justify-between">
                                <p class="text-gray-600">تخفیف کالاها</p>
                                <p class="text-red-600"><span class="text-lg">{{ fa_price($totalDiscountAmount) }}</span> تومان</p>
                            </div>
                        @endif

                        <div class="flex flex-wrap justify-between">
                            <p class="text-gray-600">هزینه ارسال</p>
                            <p><span class="text-lg">{{ fa_price($totalDeliveryAmount) }}</span> تومان</p>
                        </div>
                    </section>

                    <hr class="my-5">

                    <div class="flex flex-wrap justify-between">
                        <p class="text-gray-600">جمع سبد خرید</p>
                        <p><span class="text-lg">{{ fa_price($finalAmount) }}</span> تومان</p>
                    </div>

                    @if ($copan)
                        @php
                            $copanDiscountAmount = 0;

                            if ($copan->amount_type === App\Models\Market\Copan::PRICEUNIT) {
                                $copanDiscountAmount = $copan->amount;
                            } elseif ($copan->amount_type === App\Models\Market\Copan::PERCENTAGE) {
                                $copanDiscountAmount = (new App\Services\DiscountService)
                                    ->getDiscount(
                                        amount: $finalAmount,
                                        percentage: $copan->amount,
                                        ceil: $copan->discount_ceiling
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
                                    {{ fa_price(
                                        $finalAmount >= $copan->amount
                                            ? $finalAmount - $copanDiscountAmount
                                            : 0
                                    )}}
                                    </span> تومان</p>
                            </div>
                        </section>
                    @endif

                    <section class="mt-9">
                        <i class="text-lg icofont-info-circle"></i>
                        <span class="text-xs">
                            کاربر گرامی خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را
                            انتخاب کنید.
                        </span>
                    </section>

                    <section class="mt-6">

                        <x-a href="{{ route('customer.cart.index') }}" class="!bg-yellow-400 !text-gray-700 shadow !tracking-normal h-10 w-full gap-2 flex justify-center">
                            بازگشت به سبد خرید
                        </x-a>

                    </section>

                </section>
            </section>
        </section>
    </section>
@endsection


@section('scripts')
    <script>
        $(function () {
            $('.click-bg-green-200').on('click', function() {
                $('.click-bg-green-200').removeClass('bg-green-200')
                $(this).addClass('bg-green-200')
            })
        })
    </script>
@endsection
