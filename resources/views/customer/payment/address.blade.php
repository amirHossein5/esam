@extends('customer.layouts.master')

@section('head-tag')
    <title>انتخاب آدرس</title>
@endsection

@section('content')
    <section>
        <x-customer.dashboard.header-text>
             تکمیل اطلاعات ارسال کالا (آدرس گیرنده، مشخصات گیرنده، نحوه ارسال)
        </x-customer.dashboard.header-text>

        <section class="flex md:flex-row flex-col gap-5 mt-4">
            <section class="md:w-9/12 rounded-md shadow-md bg-white border p-3">

                <section class="p-3">

                    <section class="choose-address">
                        <section class="cursor-pointer address  border-gray-300 border-2 p-2 my-2 rounded-md bg-gray-50 hover:bg-gray-200">
                            <div class="flex gap-1">
                                <i class="icofont-location-pin text-lg"></i>
                                <div>
                                    آدرس:
                                    استان تهران، شهر تهران، تهران، خ. حافظ، پایینتر از تقاطع امام خمینی، بن. هشمی، پلاک 3، واحد
                                    4
                                </div>
                            </div>

                            <div class="mt-2 flex gap-1">
                                <i class="icofont-user-alt-7 text-lg"></i>
                                <div>
                                    گیرنده:
                                    کامران محمدی
                                </div>
                            </div>

                            <div class="mt-2 flex gap-1">
                                <i class="icofont-phone text-lg"></i>
                                <div>
                                    موبایل گیرنده:
                                    09129998877
                                </div>
                            </div>

                            <div class="mt-4 flex justify-between flex-wrap gap-5">
                                <x-a href="#">
                                    ویرایش
                                </x-a>
                                <section class="choosed hidden  text-green-500 text-xs">
                                    به این آدرس ارسال خواهد شد.
                                </section>
                            </div>
                        </section>

                        <section class="cursor-pointer address  border-gray-300 border-2 p-2 my-2 rounded-md bg-gray-50 hover:bg-gray-200">
                            <div class="flex gap-1">
                                <i class="icofont-location-pin text-lg"></i>
                                <div>
                                    آدرس:
                                    استان تهران، شهر تهران، تهران، خ. حافظ، پایینتر از تقاطع امام خمینی، بن. هشمی، پلاک 3، واحد
                                    4
                                </div>
                            </div>

                            <div class="mt-2 flex gap-1">
                                <i class="icofont-user-alt-7 text-lg"></i>
                                <div>
                                    گیرنده:
                                    کامران محمدی
                                </div>
                            </div>

                            <div class="mt-2 flex gap-1">
                                <i class="icofont-phone text-lg"></i>
                                <div>
                                    موبایل گیرنده:
                                    09129998877
                                </div>
                            </div>

                            <div class="mt-4 flex justify-between flex-wrap gap-5">
                                <x-a href="#">
                                    ویرایش
                                </x-a>
                                <section class="choosed hidden  text-green-500 text-xs">
                                    به این آدرس ارسال خواهد شد.
                                </section>
                            </div>
                        </section>

                        <section class="cursor-pointer address  border-gray-300 border-2 p-2 my-2 rounded-md bg-gray-50 hover:bg-gray-200">
                            <div class="flex gap-1">
                                <i class="icofont-location-pin text-lg"></i>
                                <div>
                                    آدرس:
                                    استان تهران، شهر تهران، تهران، خ. حافظ، پایینتر از تقاطع امام خمینی، بن. هشمی، پلاک 3، واحد
                                    4
                                </div>
                            </div>

                            <div class="mt-2 flex gap-1">
                                <i class="icofont-user-alt-7 text-lg"></i>
                                <div>
                                    گیرنده:
                                    کامران محمدی
                                </div>
                            </div>

                            <div class="mt-2 flex gap-1">
                                <i class="icofont-phone text-lg"></i>
                                <div>
                                    موبایل گیرنده:
                                    09129998877
                                </div>
                            </div>

                            <div class="mt-4 flex justify-between flex-wrap gap-5">
                                <x-a href="#">
                                    ویرایش
                                </x-a>
                                <section class="choosed hidden  text-green-500 text-xs">
                                    به این آدرس ارسال خواهد شد.
                                </section>
                            </div>
                        </section>
                    </section>

                    <div class="mt-20">
                        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
                            ساخت آدرس جدید
                        </x-customer.dashboard.header-text>

                        <form action="" method="post" class="p-2 pt-0">

                            <section class="flex md:flex-row flex-col my-4 gap-3">
                                <div class="md:w-1/2">
                                    <x-label for="" class="text-sm m-2">
                                        استان
                                    </x-label>

                                    <x-select class="w-full rtl" dir="rtl">
                                        <option value="">انتخاب</option>
                                    </x-select>
                                </div>

                                <div class="md:w-1/2">
                                    <x-label for="" class="text-sm m-2">
                                        شهر
                                    </x-label>

                                    <x-select class="w-full" dir="rtl">
                                        <option value="">انتخاب</option>
                                    </x-select>
                                </div>
                            </section>

                            <div class="my-4">
                                <x-label for="" class="text-sm m-2">
                                    نشانی
                                </x-label>

                                <x-input type="text" class="w-full" />
                            </div>

                            <div class="my-4">
                                <x-label for="" class="text-sm m-2">
                                    کد پستی
                                </x-label>

                                <x-input type="text" class="w-full" />
                            </div>

                            <section class="flex md:flex-row flex-col my-4 gap-3">
                                <div class="md:w-1/2">
                                    <x-label for="" class="text-sm m-2">
                                        پلاک
                                    </x-label>

                                    <x-input type="text" class="w-full" />

                                </div>

                                <div class="md:w-1/2">
                                    <x-label for="" class="text-sm m-2">
                                        واحد
                                    </x-label>

                                    <x-input type="text" class="w-full" />

                                </div>
                            </section>

                            <hr />

                            <div class="my-4 flex items-center gap-1">
                                <x-input type="checkbox" class=" p-2" id="t" />

                                <x-label for="t" class="text-sm m-1">
                                    گیرنده سفارش خودم هستم
                                </x-label>
                            </div>

                            <section class="flex md:flex-row flex-col my-4 gap-3">
                                <div class="md:w-1/2">
                                    <x-label for="" class="text-sm m-2">
                                        نام گیرنده
                                    </x-label>

                                    <x-input type="text" class="w-full" />

                                </div>

                                <div class="md:w-1/2">
                                    <x-label for="" class="text-sm m-2">
                                        نام خانوادگی گیرنده
                                    </x-label>

                                    <x-input type="text" class="w-full" />

                                </div>
                            </section>

                            <div class="my-4">
                                <x-label for="" class="text-sm m-2">
                                    شماره موبایل
                                </x-label>

                                <x-input type="text" class="w-full" />
                            </div>

                            <x-button class="w-full flex justify-center h-[35px] bg-gray-800">
                                ثبت آدرس
                            </x-button>
                        </form>

                    </div>
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
