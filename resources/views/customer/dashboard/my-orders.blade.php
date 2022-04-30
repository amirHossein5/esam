@extends('customer.dashboard.layouts.master')

@section('head-tag')
    <title> سفارش ها </title>
@endsection

@section('content')
    <section class="md:w-9/12 bg-white rounded-md border shadow-md p-2 pt-0">
        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
            تاریخچه سفارشات
        </x-customer.dashboard.header-text>

        <section>
            <section class="px-3 py-6 first:pt-3  border-b last:border-b-0">
                <div class="flex gap-1">
                    <i class="icofont-calendar text-lg"></i>

                    <div class="text-gray-600">
                        24 مهر 1399
                    </div>
                </div>

                <div class="mt-2 flex gap-1">
                    <i class="icofont-bar-code text-lg"></i>

                    <div class="text-gray-600">
                        کد سفارش : 14893857
                    </div>
                </div>

                <div class="mt-2 flex gap-1">
                    <i class="icofont-clock-time text-lg"></i>

                    <div class="text-gray-600">
                        در انتظار پرداخت
                    </div>
                </div>

                <div class="mt-6">
                    <div class="mr-2 text-gray-600 text-base">
                        قیمت کالاها : 398,000 تومان
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mr-2 text-gray-600 text-base">
                        تخفیف کالاها : <span class="text-red-600 text-base">78,000 تومان</span>
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mr-2 text-gray-600 text-base">
                        قیمت نهایی : 398,000 تومان
                    </div>
                </div>

                <div class='flex flex-wrap gap-2 mt-4'>
                    <img class="w-28" src="{{ asset('app-assets/images/saffir_40300-22063852!3.jpg') }}" alt="">
                    <img class="w-28" src="{{ asset('app-assets/images/saffir_200-22063852!3.jpg') }}" alt="">
                    <img class="w-28" src="{{ asset('app-assets/images/saffir_340300-22063852!1.jpg') }}"
                        alt="">
                </div>
            </section>
            <section class="px-3 py-6 first:pt-3  border-b last:border-b-0">
                <div class="flex gap-1">
                    <i class="icofont-calendar text-lg"></i>

                    <div class="text-gray-600">
                        24 مهر 1399
                    </div>
                </div>

                <div class="mt-2 flex gap-1">
                    <i class="icofont-bar-code text-lg"></i>

                    <div class="text-gray-600">
                        کد سفارش : 14893857
                    </div>
                </div>

                <div class="mt-2 flex gap-1">
                    <i class="icofont-clock-time text-lg"></i>

                    <div class="text-gray-600">
                        در انتظار پرداخت
                    </div>
                </div>

                <div class="mt-6">
                    <div class="mr-2 text-gray-600 text-base">
                        قیمت کالاها : 398,000 تومان
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mr-2 text-gray-600 text-base">
                        تخفیف کالاها : <span class="text-red-600 text-base">78,000 تومان</span>
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mr-2 text-gray-600 text-base">
                        قیمت نهایی : 398,000 تومان
                    </div>
                </div>

                <div class='flex flex-wrap gap-2 mt-4'>
                    <img class="w-28" src="{{ asset('app-assets/images/saffir_40300-22063852!3.jpg') }}" alt="">
                    <img class="w-28" src="{{ asset('app-assets/images/saffir_200-22063852!3.jpg') }}" alt="">
                    <img class="w-28" src="{{ asset('app-assets/images/saffir_340300-22063852!1.jpg') }}"
                        alt="">
                </div>
            </section>

            <section class="px-3 py-6 first:pt-3  border-b last:border-b-0">
                <div class="flex gap-1">
                    <i class="icofont-calendar text-lg"></i>

                    <div class="text-gray-600">
                        24 مهر 1399
                    </div>
                </div>

                <div class="mt-2 flex gap-1">
                    <i class="icofont-bar-code text-lg"></i>

                    <div class="text-gray-600">
                        کد سفارش : 14893857
                    </div>
                </div>

                <div class="mt-2 flex gap-1">
                    <i class="icofont-clock-time text-lg"></i>

                    <div class="text-gray-600">
                        در انتظار پرداخت
                    </div>
                </div>

                <div class="mt-6">
                    <div class="mr-2 text-gray-600 text-base">
                        قیمت کالاها : 398,000 تومان
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mr-2 text-gray-600 text-base">
                        تخفیف کالاها : <span class="text-red-600 text-base">78,000 تومان</span>
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mr-2 text-gray-600 text-base">
                        قیمت نهایی : 398,000 تومان
                    </div>
                </div>

                <div class='flex flex-wrap gap-2 mt-4'>
                    <img class="w-28" src="{{ asset('app-assets/images/saffir_40300-22063852!3.jpg') }}" alt="">
                    <img class="w-28" src="{{ asset('app-assets/images/saffir_200-22063852!3.jpg') }}" alt="">
                    <img class="w-28" src="{{ asset('app-assets/images/saffir_340300-22063852!1.jpg') }}"
                        alt="">
                </div>
            </section>

            <section class="px-3 py-6 first:pt-3  border-b last:border-b-0">
                <div class="flex gap-1">
                    <i class="icofont-calendar text-lg"></i>

                    <div class="text-gray-600">
                        24 مهر 1399
                    </div>
                </div>

                <div class="mt-2 flex gap-1">
                    <i class="icofont-bar-code text-lg"></i>

                    <div class="text-gray-600">
                        کد سفارش : 14893857
                    </div>
                </div>

                <div class="mt-2 flex gap-1">
                    <i class="icofont-clock-time text-lg"></i>

                    <div class="text-gray-600">
                        در انتظار پرداخت
                    </div>
                </div>

                <div class="mt-6">
                    <div class="mr-2 text-gray-600 text-base">
                        قیمت کالاها : 398,000 تومان
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mr-2 text-gray-600 text-base">
                        تخفیف کالاها : <span class="text-red-600 text-base">78,000 تومان</span>
                    </div>
                </div>

                <div class="mt-2">
                    <div class="mr-2 text-gray-600 text-base">
                        قیمت نهایی : 398,000 تومان
                    </div>
                </div>

                <div class='flex flex-wrap gap-2 mt-4'>
                    <img class="w-28" src="{{ asset('app-assets/images/saffir_40300-22063852!3.jpg') }}" alt="">
                    <img class="w-28" src="{{ asset('app-assets/images/saffir_200-22063852!3.jpg') }}" alt="">
                    <img class="w-28" src="{{ asset('app-assets/images/saffir_340300-22063852!1.jpg') }}"
                        alt="">
                </div>
            </section>

        </section>
    </section>
@endsection
