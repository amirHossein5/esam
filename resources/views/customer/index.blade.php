@extends('customer.layouts.master')

@section('head-tag')
    <title>{{ $setting->title }}</title>
    <link rel="stylesheet" href="{{ asset('app-assets/OwlCarousel/owl.carousel.min.css') }}">
@endsection

@section('content')
    {{-- banners --}}
    <section class="banners owl-carousel banners-owl-carousel owl-theme">
        @foreach ($banners as $banner)
            <section class="">
                <a href="{{ urldecode($banner->url) }}">
                    <section class="lazy">
                        <img data-src="{{ asset($banner->banner) }}" class="max-h-[308px] owl-lazy" alt="">
                    </section>
                </a>
            </section>
        @endforeach
    </section>

    {{-- discounted products --}}
    @if ($discountedProducts?->isNotEmpty())
        <section class="mt-7 md:mt-3">
            <h6 class="title">خوش قیمت</h6>

            <x-product.show
                type="carousel"
                :products="$discountedProducts"
            />

        </section>
    @endif

    {{-- auctions banners --}}
    {{-- <section class="grid grid-cols-2 gap-3 mt-8 md:my-4 sm:grid-cols-3 md:grid-cols-4">
        <div>
            <a href="">
                <img class="rounded-md shadow-md lazy" src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}"
                    data-src="{{ asset('app-assets/images/001004-449x336-Auction-coin-min.jpg') }}" alt="">
            </a>
        </div>
        <div>
            <a href="">
                <img class="rounded-md shadow-md lazy" src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}"
                    data-src="{{ asset('app-assets/images/001004-449x336-Auction-coin-min.jpg') }}" alt="">
            </a>
        </div>
        <div>
            <a href="">
                <img class="rounded-md shadow-md lazy" src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}"
                    data-src="{{ asset('app-assets/images/001004-449x336-Auction-coin-min.jpg') }}" alt="">
            </a>
        </div>
        <div>
            <a href="">
                <img class="rounded-md shadow-md lazy" src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}"
                    data-src="{{ asset('app-assets/images/001004-449x336-Auction-coin-min.jpg') }}" alt="">
            </a>
        </div>
    </section> --}}

    {{-- last remaining auctions --}}
    @if ($lastRemainingAuctions?->isNotEmpty())
        <section class="mt-8 md:mt-3">
            <h6 class="title">مزایدات لحظه آخری</h6>

            <x-product.show
                type="carousel"
                :products="$lastRemainingAuctions"
            />

        </section>
    @endif

    {{-- most visited --}}
    @if ($mostVisited?->isNotEmpty())
        <section class="mt-8 md:mt-3">
            <h6 class="title">پر بازدید</h6>

            <x-product.show
                type="carousel"
                :products="$mostVisited"
            />

        </section>
    @endif

    {{-- hot auctions --}}
    @if($hotAuctions?->isNotEmpty())
        <section class="mt-8 md:mt-3">
            <h6 class="title">مزایدات داغ</h6>

            <x-product.show
                type="carousel"
                :products="$hotAuctions"
            />

        </section>
    @endif
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
        });
    </script>
@endsection
