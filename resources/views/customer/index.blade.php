@extends('customer.layouts.master')

@section('head-tag')
    <title>ایسام</title>
    <link rel="stylesheet" href="{{ asset('app-assets/OwlCarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/OwlCarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/owl-carousel-navs-modification.css') }}">

    <style>
        section.lazy::before {
            background-image: url("<?= asset('app-assets/OwlCarousel/ajax-loader.gif') ?>");
            background-position: 50%;
            background-repeat: no-repeat;
            content: "";
            height: 100%;
            position: absolute;
            width: 100%;
            z-index: -1;
        }

    </style>
@endsection

@section('content')
    {{-- banners --}}
    <section class="banners owl-carousel banners-owl-carousel owl-theme">
        <section class="">
            <a href="">
                <section class="lazy">
                    <img data-src="{{ asset('app-assets/images/slider-desktop-Slider-desktop-neysan-abi-min-min.jpg') }}"
                        class="max-h-[308px] owl-lazy" alt="">
                </section>
            </a>
        </section>
        <section class="">
            <a href="">
                <section class="lazy">
                    <img data-src="{{ asset('app-assets/images/slider-desktop-Slider-desktop-neysan-abi-min-min.jpg') }}"
                        class="max-h-[308px] owl-lazy" alt="">
                </section>
            </a>
        </section>
    </section>

    {{-- products --}}
    <section class="mt-8 md:mt-3">
        <h6 class="title">خوش قیمت</h6>

        <section class="owl-carousel products-owl-carousel owl-theme">
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
                            data-src="{{ asset('app-assets/images/saffir_200-22063852!3.jpg') }}"
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
        </section>

    </section>

    {{-- auctions banners --}}
    <section class="grid grid-cols-2 gap-3 mt-8 md:mt-3 sm:grid-cols-3 md:grid-cols-4">
        <div>
            <a href="">
                <img class="rounded-md shadow-md lazy"
                    src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}"
                    data-src="{{ asset('app-assets/images/001004-449x336-Auction-coin-min.jpg') }}" alt="">
            </a>
        </div>
        <div>
            <a href="">
                <img class="rounded-md shadow-md lazy"
                    src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}"
                    data-src="{{ asset('app-assets/images/001004-449x336-Auction-coin-min.jpg') }}" alt="">
            </a>
        </div>
        <div>
            <a href="">
                <img class="rounded-md shadow-md lazy"
                    src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}"
                    data-src="{{ asset('app-assets/images/001004-449x336-Auction-coin-min.jpg') }}" alt="">
            </a>
        </div>
        <div>
            <a href="">
                <img class="rounded-md shadow-md lazy"
                    src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}"
                    data-src="{{ asset('app-assets/images/001004-449x336-Auction-coin-min.jpg') }}" alt="">
            </a>
        </div>
    </section>

    {{-- products --}}
    <section class="mt-8 md:mt-3">
        <h6 class="title">دست دوم</h6>

        <section class="owl-carousel products-owl-carousel owl-theme">
            <section class="relative bg-white rounded-md shadow-md">
                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
                            data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                            src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                    </section>
                </a>
                <section class="mt-2">
                    <a href="" class="block p-2 text-base a-hover">
                        گرافیک asus gtx 1050 ti 4g
                    </a>
                    <section class="flex justify-center items-center py-4 px-2 border-t min-h-[9rem]">
                        <div>
                            <div class="text-center">
                                <span class="text-xl ">81,1515,1</span>
                                تومان
                            </div>
                        </div>
                    </section>
                </section>
            </section>
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
            <section class="relative bg-white rounded-md shadow-md">
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                    </div>
                </section>

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
        </section>

    </section>

    {{-- hot auctions --}}
    <section class="mt-8 md:mt-3">
        <h6 class="title">مزایدات داغ</h6>

        <section class="owl-carousel products-owl-carousel owl-theme">

            <section class="relative bg-white rounded-md shadow-md">

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-2xl text-red-600">20</span>
                    </section>
                    <section class="flex items-center justify-center px-2 py-4 border-t">
                        <div class="text-center">
                            <span class="text-2xl text-red-600">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="relative bg-white rounded-md shadow-md">

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-2xl text-red-600">20</span>
                    </section>
                    <section class="flex items-center justify-center px-2 py-4 border-t">
                        <div class="text-center">
                            <span class="text-2xl text-red-600">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="relative bg-white rounded-md shadow-md">

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-2xl text-red-600">20</span>
                    </section>
                    <section class="flex items-center justify-center px-2 py-4 border-t">
                        <div class="text-center">
                            <span class="text-2xl text-red-600">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="relative bg-white rounded-md shadow-md">

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-2xl text-red-600">20</span>
                    </section>
                    <section class="flex items-center justify-center px-2 py-4 border-t">
                        <div class="text-center">
                            <span class="text-2xl text-red-600">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="relative bg-white rounded-md shadow-md">

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-2xl text-red-600">20</span>
                    </section>
                    <section class="flex items-center justify-center px-2 py-4 border-t">
                        <div class="text-center">
                            <span class="text-2xl text-red-600">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="relative bg-white rounded-md shadow-md">

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-2xl text-red-600">20</span>
                    </section>
                    <section class="flex items-center justify-center px-2 py-4 border-t">
                        <div class="text-center">
                            <span class="text-2xl text-red-600">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="relative bg-white rounded-md shadow-md">

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-2xl text-red-600">20</span>
                    </section>
                    <section class="flex items-center justify-center px-2 py-4 border-t">
                        <div class="text-center">
                            <span class="text-2xl text-red-600">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="relative bg-white rounded-md shadow-md">

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-2xl text-red-600">20</span>
                    </section>
                    <section class="flex items-center justify-center px-2 py-4 border-t">
                        <div class="text-center">
                            <span class="text-2xl text-red-600">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="relative bg-white rounded-md shadow-md">

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-2xl text-red-600">20</span>
                    </section>
                    <section class="flex items-center justify-center px-2 py-4 border-t">
                        <div class="text-center">
                            <span class="text-2xl text-red-600">41:11:09</span>
                        </div>
                    </section>
                </section>
            </section>
            <section class="relative bg-white rounded-md shadow-md">

                <a href="" class="flex items-center justify-center py-2 pointer">
                    <section class="">
                        <img class="rounded owl-lazy"
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
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
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
@endsection

@section('scripts')
    <script src="{{ asset('app-assets/OwlCarousel/owl.carousel.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".banners-owl-carousel").owlCarousel({
                lazyLoad: true,
                items: 1,
                margin: 10,
                rtl: true,
                loop: true,
                lazyLoad: true,
                autoplay: true,
                autoplayHoverPause: true
            });

            $(".products-owl-carousel").owlCarousel({
                lazyLoad: true,
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
