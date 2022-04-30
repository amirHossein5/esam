@extends('customer.dashboard.layouts.master')

@section('head-tag')
    <title> داشبورد </title>
@endsection

@section('content')
    <section class="md:w-9/12 bg-white rounded-md border shadow-md p-2 pt-0 flex flex-col">
        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
            داشبورد
        </x-customer.dashboard.header-text>

        <div class="text-gray-300 font-bold flex justify-center items-center h-full">
            داشبورد
        </div>
    </section>
@endsection
