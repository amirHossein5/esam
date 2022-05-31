@extends('customer.layouts.master')

@section('head-tag')
    <title>
        ثبت کد تخفیف و پرداخت
    </title>
@endsection

@section('content')
    <section>
        <x-customer.dashboard.header-text>
             ثبت کد تخفیف و پرداخت
        </x-customer.dashboard.header-text>

        <section class="flex md:flex-row flex-col gap-5 mt-4">
            <section class="md:w-9/12">
                <section class=" rounded-md shadow-md bg-white border p-3">

                    <section class="p-3">

                        <section>
                            <h6 class="border-b pb-2"> کد تخفیف </h6>

                            <div class="rounded-md my-4 text-gray-600 bg-blue-200 p-2">
                                <i class="icofont-info-circle text-lg"></i>
                                کد تخفیف خود را در این بخش وارد کنید.
                            </div>

                            <form action="{{ route('customer.payment.registerCode', $address->id) }}" method="post">
                                @csrf
                                <div class="my-4 flex">
                                    <x-input name="code" type="text" value="{{ old('code') }}" class="rounded-l-none py-1" placeholder="کد تخفیف را وارد کنید"/>
                                    <x-button class="bg-gray-800 px-2 rounded-r-none tracking-normal">اعمال کد تخفیف</x-button>
                                </div>

                                @error('code')
                                    <section class="error">
                                        {{ $message }}
                                    </section>
                                @enderror
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
                    <section class="mt-2">

                        <x-a href="{{ route('customer.payment.payPage', $address->id) }}" class="!bg-red-600 tracking-normal h-10 w-full flex justify-center complete-payment">پرداخت</x-a>

                    </section>
                </section>
            </section>
        </section>
    </section>
@endsection

