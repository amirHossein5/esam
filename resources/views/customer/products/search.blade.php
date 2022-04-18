@extends('customer.layouts.master')

@section('head-tag')
    <title>جستجو</title>
@endsection

@section('content')
    <section class="p-4">
        <section class="md:flex block gap-6">
            <section class="w-full md:w-3/12">

                {{-- if didn't choose any group --}}
                <section class="p-3 bg-white border shadow-md">
                    <div class="border-b pb-3">
                        گروه ها
                    </div>
                    <div class="flex mt-3 flex-col gap-2">
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
                <section class="px-3 pt-3 pb-0 bg-white drop-list mt-2 border shadow-md" data-open="false">
                    <div class="cursor-pointer drop-list-click-open border-b pb-3">
                        <i class="icofont-caret-down"></i>
                        برند
                    </div>

                    <section class="drop-list-zone py-3">
                        <section class="flex-col gap-3 flex">
                            <div>
                                <x-input type="checkbox" class="rounded-sm p-2" />
                                <x-label class="mr-1 inline font-semibold">ایسوس</x-label>
                            </div>
                            <div>
                                <x-input type="checkbox" class="rounded-sm p-2" />
                                <x-label class="mr-1 inline font-semibold">ایسوس</x-label>
                            </div>
                            <div>
                                <x-input type="checkbox" class="rounded-sm p-2" />
                                <x-label class="mr-1 inline font-semibold">ایسوس</x-label>
                            </div>
                            <div>
                                <x-input type="checkbox" class="rounded-sm p-2" />
                                <x-label class="mr-1 inline font-semibold">ایسوس</x-label>
                            </div>
                            <div>
                                <x-input type="checkbox" class="rounded-sm p-2" />
                                <x-label class="mr-1 inline font-semibold">ایسوس</x-label>
                            </div>
                        </section>
                    </section>
                </section>


                <section class="mt-2 p-3 bg-white border shadow-md">
                    <div class="border-b pb-3">
                        بازه قیمت (تومان)
                    </div>
                    <div class="flex mt-3 flex-col gap-2">

                        <section class="flex flex-wrap gap-y-4 items-center ">
                            <section class="w-full sm:w-48 md:w-full flex items-center gap-3 pr-3">
                                از
                                <x-input type="text" class="w-full h-10" />
                            </section>
                            <section class="w-full sm:w-48 md:w-full flex items-center gap-3  pr-3">
                                تا
                                <x-input type="text" class="w-full h-10" />
                            </section>
                            <section class="w-full sm:w-auto md:w-full flex justify-center pr-3">
                                <x-button class=" w-20 flex justify-center">
                                    <i class="icofont-filter"></i>
                                </x-button>
                            </section>
                        </section>

                        <section class="flex py-3 flex-col gap-3 mt-4">
                            <div>
                                <x-input type="checkbox" class="rounded-sm p-2" />
                                <x-label class="mr-1 inline font-semibold">ارسال رایگان</x-label>
                            </div>
                            <div>
                                <x-input type="checkbox" class="rounded-sm p-2" />
                                <x-label class="mr-1 inline font-semibold"> تخفیف دارد </x-label>
                            </div>
                        </section>
                    </div>
                </section>

                {{-- filters --}}
                <section class="mt-10 flex flex-wrap gap-1">

                    <a href=""
                        class="flex gap-2 items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white focus:outline-none focus:ring ring-gray-300 transition ">
                        <i class="icofont-delete text-red-600 text-2xl"></i>
                        <span>
                            برند:
                            اپل - apple
                        </span>
                    </a>

                    <a href=""
                        class="flex gap-2 items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white focus:outline-none focus:ring ring-gray-300 transition ">
                        <i class="icofont-delete text-red-600 text-2xl"></i>
                        <span>
                            برند:
                            اپل - apple
                        </span>
                    </a>

                    <a href=""
                        class="flex gap-2 items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white focus:outline-none focus:ring ring-gray-300 transition ">
                        <i class="icofont-delete text-red-600 text-2xl"></i>
                        <span>
                            حذف همه فیلتر ها
                        </span>
                    </a>
                </section>

            </section>

            <section class="w-full md:w-9/12 md:mt-0 mt-7">
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
