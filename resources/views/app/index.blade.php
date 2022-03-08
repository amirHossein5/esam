@extends('app.layouts.master')

@section('head-tag')
    <title>ایسام</title>
    <link rel="stylesheet" href="{{ asset('app-assets/OwlCarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/OwlCarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/owl-carousel-navs-modification.css') }}">
@endsection

@section('content')
    {{-- discount --}}
    <section class="mt-2 sm:flex">
        <section class="sm:w-2/3 max-h-[55px]">
            <img src="{{ asset('app-assets/images/001212-coupon-first-shop2.webp') }}" alt=""
                class="sm:h-full min-h-[30px]">
        </section>
        <section class="sm:w-1/3 flex p-3 max-h-[55px] items-center bg-blue-300">
            <section class="w-1/2 px-3 py-1 rounded-md border-dashed border flex flex-col items-center border-gray-700">
                <p class="text-gray-700">کد تخفیف:</p>
                <input type="text" class="w-36 sm:h-8 h-5 bg-transparent text-center border-none select-inside-text"
                    value="hello">
            </section>
            <section class="w-1/2 flex justify-center items-center">
                <span class="text-gray-700 text-2xl">11:10:09</span>
            </section>
        </section>
    </section>

    {{-- banners --}}
    <section class="banners owl-carousel banners-owl-carousel owl-theme mt-5">
        <section class="">
            <a href="">
                <img data-src="{{ asset('app-assets/images/slider-desktop-Slider-desktop-neysan-abi-min-min.jpg') }}"
                    class="max-h-[308px] owl-lazy" alt="">
            </a>
        </section>
        <section class="">
            <a href="">
                <img data-src="{{ asset('app-assets/images/slider-desktop-Slider-desktop-neysan-abi-min-min.jpg') }}"
                    class="max-h-[308px] owl-lazy" alt="">
            </a>
        </section>
    </section>

    {{-- products --}}
    <section class="mt-8 md:mt-3">
        <h6 class="title">خوش قیمت</h6>

        <section class="owl-carousel products-owl-carousel owl-theme">
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
        </section>

    </section>

    {{-- auctions banners --}}
    <section class="mt-8 md:mt-3 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
        <div>
            <a href="">
                <img class="lazy rounded-md shadow-md"
                    src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}"
                    data-src="{{ asset('app-assets/images/001004-449x336-Auction-coin-min.jpg') }}" alt="">
            </a>
        </div>
        <div>
            <a href="">
                <img class="lazy rounded-md shadow-md"
                    src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}"
                    data-src="{{ asset('app-assets/images/001004-449x336-Auction-coin-min.jpg') }}" alt="">
            </a>
        </div>
        <div>
            <a href="">
                <img class="lazy rounded-md shadow-md"
                    src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}"
                    data-src="{{ asset('app-assets/images/001004-449x336-Auction-coin-min.jpg') }}" alt="">
            </a>
        </div>
        <div>
            <a href="">
                <img class="lazy rounded-md shadow-md"
                    src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}"
                    data-src="{{ asset('app-assets/images/001004-449x336-Auction-coin-min.jpg') }}" alt="">
            </a>
        </div>
    </section>

    {{-- products --}}
    <section class="mt-8 md:mt-3">
        <h6 class="title">دست دوم</h6>

        <section class="owl-carousel products-owl-carousel owl-theme">
            <section class="rounded-md bg-white shadow-md relative">
                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t min-h-[9rem]">
                        <div>
                            <div class="text-center">
                                <span class=" text-xl">81,1515,1</span>
                                تومان
                            </div>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">
                <section class="absolute left-0 top-2">
                    <div class="w-28 text-center">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <span class=" text-red-600 text-xl">81,1515,1</span>
                                تومان
                            </div>
                            <div class="text-center">
                                <span class="line-through">81,1515,1</span>
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
        </section>

    </section>

    {{-- hot auctions --}}
    <section class="mt-8 md:mt-3">
        <h6 class="title">مزایدات داغ</h6>

        <section class="owl-carousel products-owl-carousel owl-theme">

            <section class="rounded-md bg-white shadow-md relative">

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <p>بالاترین پیشنهاد:</p>
                                <span class=" text-red-600 text-xl mt-1">81,1515,1</span>
                                تومان
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-red-600 text-2xl">20</span>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <p>بالاترین پیشنهاد:</p>
                                <span class=" text-red-600 text-xl mt-1">81,1515,1</span>
                                تومان
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-red-600 text-2xl">20</span>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <p>بالاترین پیشنهاد:</p>
                                <span class=" text-red-600 text-xl mt-1">81,1515,1</span>
                                تومان
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-red-600 text-2xl">20</span>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <p>بالاترین پیشنهاد:</p>
                                <span class=" text-red-600 text-xl mt-1">81,1515,1</span>
                                تومان
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-red-600 text-2xl">20</span>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <p>بالاترین پیشنهاد:</p>
                                <span class=" text-red-600 text-xl mt-1">81,1515,1</span>
                                تومان
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-red-600 text-2xl">20</span>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <p>بالاترین پیشنهاد:</p>
                                <span class=" text-red-600 text-xl mt-1">81,1515,1</span>
                                تومان
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-red-600 text-2xl">20</span>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <p>بالاترین پیشنهاد:</p>
                                <span class=" text-red-600 text-xl mt-1">81,1515,1</span>
                                تومان
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-red-600 text-2xl">20</span>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <p>بالاترین پیشنهاد:</p>
                                <span class=" text-red-600 text-xl mt-1">81,1515,1</span>
                                تومان
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-red-600 text-2xl">20</span>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <p>بالاترین پیشنهاد:</p>
                                <span class=" text-red-600 text-xl mt-1">81,1515,1</span>
                                تومان
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-red-600 text-2xl">20</span>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="rounded-md bg-white shadow-md relative">

                <a href="" class="pointer flex justify-center items-center py-2">
                    <section class="">
                        <img class="lazy rounded"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="a-hover p-2 block text-base">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div>
                            <div class="text-center">
                                <p>بالاترین پیشنهاد:</p>
                                <span class=" text-red-600 text-xl mt-1">81,1515,1</span>
                                تومان
                            </div>
                        </div>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-red-600 text-2xl">20</span>
                    </section>
                    <section class="flex justify-center items-center py-4 px-2 border-t">
                        <div class="text-center">
                            <span class="text-red-600 text-2xl">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>

        </section>

    </section>
@endsection

@section('scripts')
    <script src="{{ asset('app-assets/OwlCarousel/owl.carousel.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".banners-owl-carousel").owlCarousel({
                items: 1,
                margin: 10,
                rtl: true,
                loop: true,
                lazyLoad: true,
                autoplay: true,
                autoplayHoverPause: true
            });

            $(".products-owl-carousel").owlCarousel({
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    400: {
                        items: 2,
                        nav: true
                    },
                    680: {
                        items: 3,
                        nav: true
                    },
                    900: {
                        items: 4,
                        nav: true,
                    },
                    1280: {
                        items: 5,
                        nav: true
                    },
                },
                margin: 10,
                rtl: true,
                lazyLoad: true,
                autoplay: true,
                autoplayHoverPause: true
            });
        });
    </script>
@endsection
