@extends('customer.dashboard.layouts.master')

@section('head-tag')
    <title> سفارش ها </title>
@endsection

@section('content')
    <section class="p-2 pt-0 bg-white border rounded-md shadow-md md:w-9/12">
        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
            تاریخچه سفارشات
        </x-customer.dashboard.header-text>

        <section>

            @forelse ($orders as $order)
                <section class="px-3 py-6 border-b first:pt-3 last:border-b-0">
                    <div class="flex gap-1">
                        <i class="text-lg icofont-calendar"></i>

                        <div class="text-gray-600">
                            24 مهر 1399
                            {{ jdate($order->created_at) }}
                        </div>
                    </div>

                    <div class="flex gap-1 mt-2">
                        <i class="text-lg icofont-bar-code"></i>

                        <div class="text-gray-600">
                            کد سفارش : {{ $order->id }}
                        </div>
                    </div>

                    <div class="flex gap-1 mt-2">
                        <i class="text-lg icofont-clock-time"></i>

                        <div class="text-gray-600">
                            {{ $order->payment?->status_readable }}
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="mr-2 text-base text-gray-600">
                            قیمت کالاها : {{ $order->order_final_amount_readable }} تومان
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="mr-2 text-base text-gray-600">
                            هزینه ارسال کالاها : {{ $order->delivery_amount_readable }} تومان
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="mr-2 text-base text-gray-600">
                            تخفیف کالاها : <span class="text-base text-red-600">{{ $order->order_discount_amount_readable }} تومان</span>
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="mr-2 text-base text-gray-600">
                            قیمت نهایی : {{ $order->order_final_amount - $order->discount_amount + $order->delivery_amount }} تومان
                        </div>
                    </div>

                    <div class='flex flex-wrap gap-2 mt-4'>
                        @foreach ($order->items as $item)
                            <img class="w-28" src="{{ asset($item->product->image) }}"
                            alt="">
                        @endforeach
                    </div>
                </section>
            @empty
                <div class="flex items-center justify-center h-full mt-4 font-bold text-gray-300">
                    چیزی برای نمایش وجود ندارد
                </div>
            @endforelse


            <section class="flex justify-center my-4">
                {{ $orders->links() }}
            </section>
        </section>
    </section>
@endsection
