@extends('customer.layouts.master')

@section('head-tag')
    <title> سوالات متداول </title>
    <link rel="stylesheet" href="{{ asset('app-assets/css/owl-carousel-navs-modification.css') }}">
@endsection

@section('content')
    <section class="p-4 bg-white border rounded-md">
        <section class="grid grid-cols-1 gap-8 md:grid-cols-2">

            <section>
                <h6 class="text-base font-bold text-gray-800"> سوالات متداول </h6>

                <div class="flex flex-col mt-3">

                    @foreach ($randomFaqs as $faq)
                        <a href="{{ route('customer.faq.show',$faq->slug) }}" class="py-4 text-sm text-gray-600 border-t a-hover first:border-t-0">
                            {{ $faq->question }}
                        </a>
                    @endforeach

                </div>
            </section>

            <section>
                <h6 class="text-base font-bold text-gray-800"> انتخاب سوال از لیست زیر </h6>

                <div class="flex flex-col mt-6 gap-7">
                    @foreach ($faqCategories as $category)
                        <div class="cursor-pointer drop-list" data-open="false">

                            <span class="py-3 text-gray-900 drop-list-click-open">
                                <i class="icofont-caret-left"></i>
                               {{ $category->name }}
                            </span>

                            <div class="hidden mt-3 drop-list-zone">
                                @foreach ($category->faqs as $faq)
                                    <a href="{{ route('customer.faq.show',$faq->slug) }}" class="block py-4 text-sm text-gray-600 border-t a-hover first:border-t-0">
                                        {{ $faq->question }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
            </section>

        </section>
    </section>
@endsection
