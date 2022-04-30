@extends('customer.dashboard.layouts.master')

@section('head-tag')
    <title> لیست علاقه مندی </title>
@endsection

@section('content')
    <section class="md:w-9/12 bg-white rounded-md border shadow-md p-3 pt-0">
        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
            لیست علاقه مندی
        </x-customer.dashboard.header-text>

        <section>
            <section class="py-4 sm:flex gap-6 border-b last:border-b-0">
                <section class="flex justify-center items-center">
                    <img src="{{ asset('app-assets/images/saffir_340300-22063852!1.jpg') }}"
                        class="max-w-xs sm:w-48 w-full rounded" alt="">
                </section>

                <section class="mt-3 flex-grow ">
                    <h6 class="text-base">گوشی موبایل سامسونگ مدل Galaxy A12 SM-A125F/DS دو ...</h6>

                    <div class=" mt-3 flex items-center gap-1">
                        <i class="icofont-box text-2xl"></i>
                        موجود در انبار
                    </div>

                    {{-- <div class="text-red-600 mt-3 flex items-center gap-1">
                   <i class="icofont-close-line text-lg"></i>
                    موجود نیست
                </div> --}}

                    <section class="flex flex-col sm:flex-row justify-between gap-6 mt-9">
                        <form action="">
                            <x-button class="bg-red-600 tracking-normal">حذف از لیست علاقه ها</x-button>
                        </form>

                        <div class="flex flex-col sm:items-end">
                            <span class="text-red-600 font-bold line-through">
                                تخفیف <span class="text-base"> 313,000</span> تومان
                            </span>
                            <span>
                                <span class="text-lg"> 313,000 </span>تومان
                            </span>
                        </div>
                    </section>
                </section>
            </section>


        </section>
    </section>
@endsection
