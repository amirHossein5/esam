@extends('customer.layouts.master')

@section('head-tag')
    <title>سبد خرید</title>
@endsection

@section('content')
    <section>
        <x-customer.dashboard.header-text>
            سبد خرید شما
        </x-customer.dashboard.header-text>

        <section class="flex md:flex-row flex-col gap-5 mt-4">
            <section class="md:w-9/12 rounded-md shadow-md bg-white border p-3">

                <section class="py-4 sm:flex gap-6 border-b last:border-b-0">
                    <section class="flex justify-center items-center">
                        <img src="{{ asset('app-assets/images/saffir_340300-22063852!1.jpg') }}"
                            class="max-w-xs sm:w-48 w-full rounded" alt="">
                    </section>

                    <section class="mt-3 flex-grow ">
                        <h6 class="text-base">گوشی موبایل سامسونگ مدل Galaxy A12 SM-A125F/DS دو ...</h6>

                        <div class=" mt-3 flex items-center gap-1">
                            <i class="icofont-box text-2xl"></i>
                            موجود در انبار
                            <span class="text-2xl font-semibold text-green-600">6</span>
                            عدد
                        </div>

                        {{-- <div class="text-red-600 mt-3 flex items-center gap-1">
                    <i class="icofont-close-line text-lg"></i>
                        موجود نیست
                    </div> --}}

                        <section class="flex flex-col sm:flex-row justify-between gap-6 mt-9">

                            <section class="flex flex-col gap-4">
                                <section class="product-number flex h-9">
                                    <x-button type="button"
                                        class="flex justify-center text-lg w-8 bg-red-600 rounded-l-none mines">-</x-button>
                                    <x-input type="text" class="w-12 number rounded-none" max="6" />
                                    <x-button type="button"
                                        class="flex justify-center text-lg w-8 bg-blue-500 rounded-r-none plus">+</x-button>
                                </section>

                                <form action="">
                                    <x-button class="bg-red-600 tracking-normal">حذف از سبد خرید</x-button>
                                </form>
                            </section>

                            <div class="flex flex-col sm:items-end">
                                <span class="text-red-600 font-bold line-through">
                                    تخفیف <span class="text-base"> 313,000</span> تومان
                                </span>
                                <span>
                                    هزینه ارسال: <span class="text-lg"> 313,000 </span>تومان
                                </span>
                                <span>
                                    <span class="text-lg"> 313,000 </span>تومان
                                </span>
                            </div>
                        </section>
                    </section>
                </section>

                <section class="py-4 sm:flex gap-6 border-b last:border-b-0">
                    <section class="flex justify-center items-center">
                        <img src="{{ asset('app-assets/images/saffir_340300-22063852!1.jpg') }}"
                            class="max-w-xs sm:w-48 w-full rounded" alt="">
                    </section>

                    <section class="mt-3 flex-grow ">
                        <h6 class="text-base">گوشی موبایل سامسونگ مدل Galaxy A12 SM-A125F/DS دو ...</h6>

                        <div class=" mt-3 flex items-center gap-1">
                            <i class="icofont-box text-2xl"></i>
                            موجود در انبار
                            <span class="text-2xl font-semibold text-green-600">6</span>
                            عدد
                        </div>

                        {{-- <div class="text-red-600 mt-3 flex items-center gap-1">
                    <i class="icofont-close-line text-lg"></i>
                        موجود نیست
                    </div> --}}

                        <section class="flex flex-col sm:flex-row justify-between gap-6 mt-9">

                            <section class="flex flex-col gap-4">
                                <section class="product-number flex h-9">
                                    <x-button type="button"
                                        class="flex justify-center text-lg w-8 bg-red-600 rounded-l-none mines">-</x-button>
                                    <x-input type="text" class="w-12 number rounded-none" max="6" />
                                    <x-button type="button"
                                        class="flex justify-center text-lg w-8 bg-blue-500 rounded-r-none plus">+</x-button>
                                </section>

                                <form action="">
                                    <x-button class="bg-red-600 tracking-normal">حذف از سبد خرید</x-button>
                                </form>
                            </section>

                            <div class="flex flex-col sm:items-end">
                                <span class="text-red-600 font-bold line-through">
                                    تخفیف <span class="text-base"> 313,000</span> تومان
                                </span>
                                <span>
                                    هزینه ارسال: <span class="text-lg"> 313,000 </span>تومان
                                </span>
                                <span>
                                    <span class="text-lg"> 313,000 </span>تومان
                                </span>
                            </div>
                        </section>
                    </section>
                </section>

            </section>

            <section class="md:w-3/12">
                <section class="sticky top-7 shadow-lg rounded-md bg-white border p-5">
                    <section class="flex flex-col gap-5">
                        <div class="flex justify-between flex-wrap">
                            <p class="text-gray-600">قیمت کالاها (2)</p>
                            <p><span class="text-lg">398,000</span> تومان</p>
                        </div>

                        <div class="flex justify-between flex-wrap">
                            <p class="text-gray-600">تخفیف کالاها</p>
                            <p class="text-red-600"><span class="text-lg">398,000</span> تومان</p>
                        </div>

                        <div class="flex justify-between flex-wrap">
                            <p class="text-gray-600">هزینه ارسال</p>
                            <p><span class="text-lg">398,000</span> تومان</p>
                        </div>
                    </section>

                    <hr class="my-5">

                    <div class="flex justify-between flex-wrap">
                        <p class="text-gray-600">جمع سبد خرید</p>
                        <p><span class="text-lg">398,000</span> تومان</p>
                    </div>

                    <section class="mt-9">
                        <i class="icofont-info-circle text-lg"></i>
                        <span class="text-xs">
                            کاربر گرامی خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را
                            انتخاب کنید.
                        </span>
                    </section>

                    <section class="mt-6">
                        <x-a href="" class="!bg-red-600 tracking-normal h-10 w-full flex justify-center">تکمیل فرآیند خرید</x-a>
                    </section>
                </section>
            </section>
        </section>
    </section>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.product-number .mines').on('click', function() {
                let numberInput = $(this).siblings('.number');
                let number = parseInt($(this).siblings('.number').val());
                let mines = $(this);
                let plus = $(this).siblings('.plus');

                $(plus).prop('disabled', false);

                if (number - 1 === 1) {
                    $(mines).prop('disabled', true);
                }

                if (number - 1 <= 0) {
                    $(mines).prop('disabled', true);
                    $(numberInput).val(1);
                } else {
                    $(numberInput).val(number - 1);
                }
            });

            $('.product-number .plus').on('click', function() {
                let numberInput = $(this).siblings('.number');
                let number = parseInt($(this).siblings('.number').val());
                let maxNumber = parseInt($(this).siblings('.number').attr('max'));
                let plus = $(this);
                let mines = $(this).siblings('.mines');

                $(mines).prop('disabled', false);

                if (number + 1 === maxNumber) {
                    $(plus).prop('disabled', true);
                }

                if (maxNumber >= number + 1) {
                    $(numberInput).val(number + 1);
                } else {
                    $(numberInput).val(maxNumber);
                    $(plus).prop('disabled', true);
                }
            });

            $('.product-number .number').focusout(function() {
                let numberInput = $(this);
                let number = parseInt($(this).val());
                let maxNumber = parseInt($(this).attr('max'));
                let mines = $(this).siblings('.mines');
                let plus = $(this).siblings('.plus');

                if (number <= 0) {
                    $(numberInput).val(1);
                    $(mines).prop('disabled', true);
                    $(plus).prop('disabled', false);
                } else if (maxNumber >= number) {
                    $(mines).prop('disabled', false);
                    $(plus).prop('disabled', false);
                    $(numberInput).val(number);
                } else {
                    $(plus).prop('disabled', true);
                    $(mines).prop('disabled', false);
                    $(numberInput).val(maxNumber);
                }
            });
        })
    </script>
@endsection
