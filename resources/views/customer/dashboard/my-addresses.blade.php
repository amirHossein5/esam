@extends('customer.dashboard.layouts.master')

@section('head-tag')
    <title> آدرس ها </title>
@endsection

@section('content')
    <section class="md:w-9/12 bg-white rounded-md border shadow-md p-2 pt-0">
        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
            آدرس های من
        </x-customer.dashboard.header-text>

        <section class="p-3">

            <section class="border-gray-300 border-2 p-2 rounded-md bg-gray-50 hover:bg-gray-200">
                <div class="flex gap-1">
                    <i class="icofont-location-pin text-lg"></i>
                    <div >
                        آدرس:
                        استان تهران، شهر تهران، تهران، خ. حافظ، پایینتر از تقاطع امام خمینی، بن. هشمی، پلاک 3، واحد 4
                    </div>
                </div>

                <div class="mt-2 flex gap-1">
                    <i class="icofont-user-alt-7 text-lg"></i>
                    <div >
                        گیرنده:
                        کامران محمدی
                    </div>
                </div>

                <div class="mt-2 flex gap-1">
                    <i class="icofont-phone text-lg"></i>
                    <div >
                        موبایل گیرنده:
                        09129998877
                    </div>
                </div>

                <div class="mt-4">
                    <x-a href="#">
                        ویرایش
                    </x-a>
                </div>
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

                        <x-input type="text" class="w-full"/>
                    </div>

                    <div class="my-4">
                        <x-label for="" class="text-sm m-2">
                            کد پستی
                        </x-label>

                        <x-input type="text" class="w-full"/>
                    </div>

                    <section class="flex md:flex-row flex-col my-4 gap-3">
                        <div class="md:w-1/2">
                            <x-label for="" class="text-sm m-2">
                                پلاک
                            </x-label>

                            <x-input type="text" class="w-full"/>

                        </div>

                        <div class="md:w-1/2">
                            <x-label for="" class="text-sm m-2">
                                واحد
                            </x-label>

                            <x-input type="text" class="w-full"/>

                        </div>
                    </section>

                    <hr/>

                    <div class="my-4 flex items-center gap-1">
                        <x-input type="checkbox" class=" p-2" id="t"/>

                        <x-label for="t" class="text-sm m-1">
                           گیرنده سفارش خودم هستم
                        </x-label>
                    </div>

                    <section class="flex md:flex-row flex-col my-4 gap-3">
                        <div class="md:w-1/2">
                            <x-label for="" class="text-sm m-2">
                                 نام گیرنده
                            </x-label>

                            <x-input type="text" class="w-full"/>

                        </div>

                        <div class="md:w-1/2">
                            <x-label for="" class="text-sm m-2">
                                 نام خانوادگی گیرنده
                            </x-label>

                            <x-input type="text" class="w-full"/>

                        </div>
                    </section>

                    <div class="my-4">
                        <x-label for="" class="text-sm m-2">
                             شماره موبایل
                        </x-label>

                        <x-input type="text" class="w-full"/>
                    </div>

                    <x-button class="w-full flex justify-center h-[35px] bg-gray-800">
                        ثبت آدرس
                    </x-button>
                </form>

            </div>
        </section>
    </section>
@endsection
