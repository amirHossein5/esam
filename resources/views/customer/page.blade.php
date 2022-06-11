@extends('customer.layouts.master')

@section('head-tag')
    <title>{{ $setting->title }}</title>
@endsection

@section('content')
    <section class="p-2 prose bg-white rounded md:prose-lg lg:prose-xl prose-strong:text-base sm:p-4">
        {!! $page->body !!}
    </section>
@endsection
