@extends('customer.layouts.master')

@section('head-tag')
    <title>{{ $faq->question }}</title>
    <link rel="stylesheet" href="{{ asset('app-assets/css/owl-carousel-navs-modification.css') }}">
@endsection

@section('content')
    <section class="p-4 bg-white border rounded-md">
        <section class="flex items-baseline justify-between border-b">
            <section class="text-xl title">
                {{ $faq->question }}
            </section>

            <section>
                <a href="{{ route('customer.faq.index') }}" class="px-4 py-2 text-gray-600 bg-blue-200 rounded-md">بازگشت به راهنما</a>
            </section>
        </section>

        <section class="py-5 prose md:prose-lg lg:prose-xl prose-strong:text-base">
            <p>
                {!! $faq->answer !!}
            </p>
        </section>
    </section>

    <section class="mt-4 bg-white border rounded-md p-7">

        <section>
            <h6 class="text-base font-bold text-gray-800"> لینکهای مرتبط </h6>

            <div class="flex flex-col mt-3">
                @foreach (collect($faq->faqCategory->faqs)->reject(fn ($item) => $item->id == $faq->id ) as $faq)
                    <a href="{{ route('customer.faq.show', $faq->slug) }}" class="py-4 text-sm text-gray-600 border-t a-hover first:border-t-0">
                        {{ $faq->question }}
                    </a>
                @endforeach
            </div>
        </section>
    </section>
@endsection
