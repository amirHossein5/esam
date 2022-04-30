@extends('customer.layouts.master')

@section('head-tag')
    <title>جستجو</title>
@endsection

@section('content')
    <section class="p-4">
        <section class="block gap-6 md:flex">
            <section class="w-full md:w-3/12">

                {{-- if didn't choose any group --}}
                <section class="p-3 bg-white border shadow-md">
                    <div class="pb-3 border-b">
                        گروه ها
                    </div>
                    <div class="flex flex-col gap-2 mt-3">
                        <a href="" class="a-hover">
                            مینی کامپیوتر (مینی کیس)
                        </a>
                        <a href="" class="a-hover">
                            مینی کامپیوتر (مینی کیس)
                        </a>
                        <a href="" class="a-hover">
                            مینی کامپیوتر (مینی کیس)
                        </a>
                    </div>
                </section>

                {{-- if choosed any category group --}}
                <section class="px-3 pt-3 pb-0 mt-2 bg-white border shadow-md drop-list" data-open="false">
                    <div class="pb-3 border-b cursor-pointer drop-list-click-open">
                        <i class="icofont-caret-down"></i>
                        برند
                    </div>

                    <section class="py-3 drop-list-zone">
                        <section class="flex flex-col gap-3">
                            <div>
                                <x-input type="checkbox" class="p-2 rounded-sm" id="" />
                                <x-label class="inline mr-1 font-semibold">ایسوس</x-label>
                            </div>
                        </section>
                    </section>
                </section>


                <section class="p-3 mt-2 bg-white border shadow-md">
                    <div class="pb-3 border-b">
                        بازه قیمت (تومان)
                    </div>
                    <div class="flex flex-col gap-2 mt-3">

                        <section class="flex flex-wrap items-center gap-y-4 ">
                            <section class="flex items-center w-full gap-3 pr-3 sm:w-48 md:w-full">
                                از
                                <x-input type="text" class="w-full h-10" />
                            </section>
                            <section class="flex items-center w-full gap-3 pr-3 sm:w-48 md:w-full">
                                تا
                                <x-input type="text" class="w-full h-10" />
                            </section>
                            <section class="flex justify-center w-full pr-3 sm:w-auto md:w-full">
                                <x-button class="flex justify-center w-20 ">
                                    <i class="icofont-filter"></i>
                                </x-button>
                            </section>
                        </section>

                        <section class="flex flex-col gap-3 py-3 mt-4">
                            <div>
                                <x-input type="checkbox" class="p-2 rounded-sm" id="free-delivery" />
                                <x-label class="inline mr-1 font-semibold" for="free-delivery">ارسال رایگان</x-label>
                            </div>
                            <div>
                                <x-input type="checkbox" class="p-2 rounded-sm" id="has-discount" />
                                <x-label class="inline mr-1 font-semibold" for="has-discount"> تخفیف دارد </x-label>
                            </div>
                        </section>
                    </div>
                </section>

                {{-- filters --}}
                <section class="flex flex-wrap gap-1 mt-10">

                    <a href=""
                        class="flex items-center gap-2 px-4 py-2 text-xs font-semibold text-white transition bg-gray-800 border rounded-md focus:outline-none focus:ring ring-gray-300 ">
                        <i class="text-2xl text-red-600 icofont-delete"></i>
                        <span>
                            برند:
                            اپل - apple
                        </span>
                    </a>

                    <a href=""
                        class="flex items-center gap-2 px-4 py-2 text-xs font-semibold text-white transition bg-gray-800 border rounded-md focus:outline-none focus:ring ring-gray-300 ">
                        <i class="text-2xl text-red-600 icofont-delete"></i>
                        <span>
                            برند:
                            اپل - apple
                        </span>
                    </a>

                    <a href=""
                        class="flex items-center gap-2 px-4 py-2 text-xs font-semibold text-white transition bg-gray-800 border rounded-md focus:outline-none focus:ring ring-gray-300 ">
                        <i class="text-2xl text-red-600 icofont-delete"></i>
                        <span>
                            حذف همه فیلتر ها
                        </span>
                    </a>
                </section>

            </section>

            <section class="w-full md:w-9/12 md:mt-0 mt-7">
                <section class="flex flex-wrap items-center gap-10 p-3 bg-white border">
                    <section class="flex border">
                        <button class="px-6 py-3 border-l">فروش عادی</button>
                        <button class="px-6 py-3 border-l">مزایده</button>
                        <button class="px-6 py-3 bg-blue-300 ">هردو</button>
                    </section>

                    <section>
                        وضعیت کالا:
                        <x-select class="text-sm w-36" dir="rtl">
                            <option value="">وضعیت کالا</option>
                        </x-select>
                    </section>

                    <section>
                        ترتیب:
                        <x-select class="text-sm w-36" dir="rtl">
                            <option value="">بهترین نتیجه</option>
                        </x-select>
                    </section>
                </section>

                <section class="p-3 mt-1 bg-white border rounded-md">
                    <p class="text-red-600 ">تعداد کالاها در این دسته بندی: <span>۱۰</span></p>
                    <p class="mt-1">در:
                        <a href="" class="a-hover">همه گروه ها</a>
                        <i class="icofont-rounded-left"></i>
                        <a href="" class="a-hover">لکامپیوتر و شبکه لپ تاپ</a>
                        <i class="icofont-rounded-left"></i>
                        <a href="" class="a-hover">لپتاپ</a>
                    </p>
                </section>
                <section>
                    <section class="mt-6">
                        <section
                            class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 justify-items-center">

                            {{-- for typical sell --}}
                            <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">
                                <section class="absolute left-0 top-2">
                                    <div class="text-center w-28">
                                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                                            class="absolute z-0 -top-[2px] left-1" alt="">
                                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                                    </div>
                                </section>

                                <a href="" class="flex items-center justify-center py-2 pointer">
                                    <section class="">
                                        <img class="rounded lazy"
                                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                                    </section>
                                </a>
                                <section class="mt-2">
                                    <a href="" class="block p-2 text-base a-hover">
                                        گرافیک asus gtx 1050 ti 4g
                                    </a>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div>
                                            <div class="text-center">
                                                <span class="text-xl text-red-600 ">81,1515,1</span>
                                                تومان
                                            </div>
                                            <div class="text-center">
                                                <span class="line-through">81,1515,1</span>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div class="text-center">
                                            <span class="text-2xl text-red-600">41:11:09</span>
                                        </div>
                                    </section>
                                </section>
                            </section>

                            {{-- for auction --}}
                            <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">

                                <a href="" class="flex items-center justify-center py-2 pointer">
                                    <section class="">
                                        <img class="rounded lazy"
                                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                                    </section>
                                </a>
                                <section class="mt-2">
                                    <a href="" class="block p-2 text-base a-hover">
                                        گرافیک asus gtx 1050 ti 4g
                                    </a>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div>
                                            <div class="text-center">
                                                <p>بالاترین پیشنهاد:</p>
                                                <span class="mt-1 text-xl text-red-600 ">81,1515,1</span>
                                                تومان
                                            </div>
                                        </div>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1"
                                            alt="">
                                        <span class="text-2xl text-red-600">20</span>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div class="text-center">
                                            <span class="text-2xl text-red-600">41:11:09</span>
                                        </div>
                                    </section>
                                </section>
                            </section>

                            <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">
                                <section class="absolute left-0 top-2">
                                    <div class="text-center w-28">
                                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                                            class="absolute z-0 -top-[2px] left-1" alt="">
                                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                                    </div>
                                </section>

                                <a href="" class="flex items-center justify-center py-2 pointer">
                                    <section class="">
                                        <img class="rounded lazy"
                                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                                    </section>
                                </a>
                                <section class="mt-2">
                                    <a href="" class="block p-2 text-base a-hover">
                                        گرافیک asus gtx 1050 ti 4g
                                    </a>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div>
                                            <div class="text-center">
                                                <span class="text-xl text-red-600 ">81,1515,1</span>
                                                تومان
                                            </div>
                                            <div class="text-center">
                                                <span class="line-through">81,1515,1</span>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div class="text-center">
                                            <span class="text-2xl text-red-600">41:11:09</span>
                                        </div>
                                    </section>
                                </section>
                            </section>

                            <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">
                                <section class="absolute left-0 top-2">
                                    <div class="text-center w-28">
                                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                                            class="absolute z-0 -top-[2px] left-1" alt="">
                                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                                    </div>
                                </section>

                                <a href="" class="flex items-center justify-center py-2 pointer">
                                    <section class="">
                                        <img class="rounded lazy"
                                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                                    </section>
                                </a>
                                <section class="mt-2">
                                    <a href="" class="block p-2 text-base a-hover">
                                        گرافیک asus gtx 1050 ti 4g
                                    </a>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div>
                                            <div class="text-center">
                                                <span class="text-xl text-red-600 ">81,1515,1</span>
                                                تومان
                                            </div>
                                            <div class="text-center">
                                                <span class="line-through">81,1515,1</span>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div class="text-center">
                                            <span class="text-2xl text-red-600">41:11:09</span>
                                        </div>
                                    </section>
                                </section>
                            </section>

                            <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">

                                <a href="" class="flex items-center justify-center py-2 pointer">
                                    <section class="">
                                        <img class="rounded lazy"
                                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                                    </section>
                                </a>
                                <section class="mt-2">
                                    <a href="" class="block p-2 text-base a-hover">
                                        گرافیک asus gtx 1050 ti 4g
                                    </a>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div>
                                            <div class="text-center">
                                                <p>بالاترین پیشنهاد:</p>
                                                <span class="mt-1 text-xl text-red-600 ">81,1515,1</span>
                                                تومان
                                            </div>
                                        </div>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1"
                                            alt="">
                                        <span class="text-2xl text-red-600">20</span>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div class="text-center">
                                            <span class="text-2xl text-red-600">41:11:09</span>
                                        </div>
                                    </section>
                                </section>
                            </section>

                            <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">

                                <a href="" class="flex items-center justify-center py-2 pointer">
                                    <section class="">
                                        <img class="rounded lazy"
                                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                                    </section>
                                </a>
                                <section class="mt-2">
                                    <a href="" class="block p-2 text-base a-hover">
                                        گرافیک asus gtx 1050 ti 4g
                                    </a>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div>
                                            <div class="text-center">
                                                <p>بالاترین پیشنهاد:</p>
                                                <span class="mt-1 text-xl text-red-600 ">81,1515,1</span>
                                                تومان
                                            </div>
                                        </div>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1"
                                            alt="">
                                        <span class="text-2xl text-red-600">20</span>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div class="text-center">
                                            <span class="text-2xl text-red-600">41:11:09</span>
                                        </div>
                                    </section>
                                </section>
                            </section>

                            <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">

                                <a href="" class="flex items-center justify-center py-2 pointer">
                                    <section class="">
                                        <img class="rounded lazy"
                                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                                    </section>
                                </a>
                                <section class="mt-2">
                                    <a href="" class="block p-2 text-base a-hover">
                                        گرافیک asus gtx 1050 ti 4g
                                    </a>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div>
                                            <div class="text-center">
                                                <p>بالاترین پیشنهاد:</p>
                                                <span class="mt-1 text-xl text-red-600 ">81,1515,1</span>
                                                تومان
                                            </div>
                                        </div>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1"
                                            alt="">
                                        <span class="text-2xl text-red-600">20</span>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div class="text-center">
                                            <span class="text-2xl text-red-600">41:11:09</span>
                                        </div>
                                    </section>
                                </section>
                            </section>

                            <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">

                                <a href="" class="flex items-center justify-center py-2 pointer">
                                    <section class="">
                                        <img class="rounded lazy"
                                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                                    </section>
                                </a>
                                <section class="mt-2">
                                    <a href="" class="block p-2 text-base a-hover">
                                        گرافیک asus gtx 1050 ti 4g
                                    </a>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div>
                                            <div class="text-center">
                                                <p>بالاترین پیشنهاد:</p>
                                                <span class="mt-1 text-xl text-red-600 ">81,1515,1</span>
                                                تومان
                                            </div>
                                        </div>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1"
                                            alt="">
                                        <span class="text-2xl text-red-600">20</span>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div class="text-center">
                                            <span class="text-2xl text-red-600">41:11:09</span>
                                        </div>
                                    </section>
                                </section>
                            </section>

                            <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">

                                <a href="" class="flex items-center justify-center py-2 pointer">
                                    <section class="">
                                        <img class="rounded lazy"
                                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                                    </section>
                                </a>
                                <section class="mt-2">
                                    <a href="" class="block p-2 text-base a-hover">
                                        گرافیک asus gtx 1050 ti 4g
                                    </a>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div>
                                            <div class="text-center">
                                                <p>بالاترین پیشنهاد:</p>
                                                <span class="mt-1 text-xl text-red-600 ">81,1515,1</span>
                                                تومان
                                            </div>
                                        </div>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1"
                                            alt="">
                                        <span class="text-2xl text-red-600">20</span>
                                    </section>
                                    <section class="flex items-center justify-center px-2 py-4 border-t">
                                        <div class="text-center">
                                            <span class="text-2xl text-red-600">41:11:09</span>
                                        </div>
                                    </section>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>

            </section>
        </section>
    </section>
@endsection
