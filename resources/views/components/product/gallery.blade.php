@props(['images'])

@push('head-tag')
    <link rel="stylesheet" href="{{ asset('app-assets/swiper-slider/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('app-assets/venobox/venobox.min.css') }}" />

    <style>
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            background-size: cover;
            background-position: center;
            margin-left: 5px !important;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .mySwiper2 .swiper-slide {
            margin-left: 0 !important;
            padding-right: 5px !important;
            padding-left: 5px !important;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .swiper {
            width: 100%;
            /* height: 160px; */
            margin-left: auto;
            margin-right: auto;
        }

        @media only screen and (min-width: 600px) {
            .swiper {
                /* height: 300px; */
            }

            .mySwiper2 {
                margin-bottom: 1rem;
            }

            .mySwiper {
                max-height: 8rem;
            }
        }

        .mySwiper {
            max-height: 4rem;
        }

        .mySwiper2 {
            margin-bottom: .5rem;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .swiper-slider-container {
            max-width: 35rem;
        }

        .vbox-close svg {
            width: 4rem;
            height: 4rem;
        }

        .swiper-wrapper .swiper-slide {
            max-height: 285px;
            height: auto;
        }

        .mySwiper .swiper-wrapper {
            max-height: 4rem
        }

    </style>
@endpush

@if ($images->isNotEmpty())
<div {!! $attributes->merge(['class' => 'swiper-slider-container']) !!}>
    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
        <div class="swiper-wrapper">
            @foreach ($images as $image)
                <div class="swiper-slide">
                    <a href="{{ $image }}" data-gall="product-gallery" class="outline-none venobox h-full">
                        <img src="{{ asset('app-assets/images/product-gallery-loader.webp') }}" class="swiper-lazy"
                            data-src="{{ $image }}" />
                    </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div thumbsSlider="" class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($images as $image)
                <div class="swiper-slide">
                    <img src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" class="swiper-lazy"
                        data-src="{{ $image }}" />
                </div>
            @endforeach
        </div>
    </div>

</div>
@else
<div class=" mt-4 font-bold text-gray-600">
    ???????? ???????? ??????????
</div>
@endif

@push('scripts')
    <script src="{{ asset('app-assets/swiper-slider/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('app-assets/venobox/venobox.min.js') }}"></script>

    <script>
        new VenoBox({
            numeration: true,
            spinner: 'swing'
        });

        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
            preloadImages: false,
            lazy: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
            preloadImages: false,
            lazy: true,
        });
    </script>
@endpush
