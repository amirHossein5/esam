@extends('customer.layouts.master')

@section('head-tag')
    <title>انتخاب آدرس</title>
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

                            <div class="my-4 flex">
                                <x-input type="text" class="rounded-l-none py-1" placeholder="کد تخفیف را وارد کنید"/>
                                <x-button class="bg-gray-800 px-2 rounded-r-none tracking-normal">اعمال کد تخفیف</x-button>
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
                             کاربر گرامی کالاها بر اساس نوع ارسالی که انتخاب می کنید در مدت زمان ذکر شده ارسال می شود.
                        </span>
                    </section>

                    <section class="mt-6">
                        <x-a href="" class="!bg-red-600 tracking-normal h-10 w-full flex justify-center">تکمیل فرآیند خرید
                        </x-a>
                    </section>
                </section>
            </section>
        </section>
    </section>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.choose-address section.address').on('click', function () {
                $(this).siblings('.address').removeClass('border-green-500')
                    .removeClass('bg-gray-200');

                $(this).siblings('.address').find('.choosed').addClass('hidden')

                $(this).addClass('bg-gray-200').addClass('border-green-500').find('.choosed').removeClass('hidden')
            })
        })
    </script>
@endsection
