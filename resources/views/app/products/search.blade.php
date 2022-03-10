@extends('app.layouts.master')

@section('head-tag')
    <title>جستجو</title>
@endsection

@section('content')
    <section class="p-4">
        <section class="md:flex block gap-6">
            <section class="w-full md:w-3/12">

            </section>

            <section class="w-full md:w-9/12">
                <section class="p-3 bg-white border flex flex-wrap gap-10 items-center">
                    <section class="flex border">
                        <button class="border-l py-3 px-6">فروش عادی</button>
                        <button class="border-l py-3 px-6">مزایده</button>
                        <button class=" py-3 px-6 bg-blue-300">هردو</button>
                    </section>

                    <section>
                        وضعیت کالا:
                        <x-select class="w-36 text-sm" dir="rtl">
                            <option value="">وضعیت کالا</option>
                        </x-select>
                    </section>

                    <section>
                        ترتیب:
                        <x-select class="w-36 text-sm" dir="rtl">
                            <option value="">بهترین نتیجه</option>
                        </x-select>
                    </section>
                </section>

                <section class="p-3 bg-white border rounded-md mt-1">
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
                            class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 justify-items-center">

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
