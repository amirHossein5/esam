@extends('customer.dashboard.layouts.master')

@section('head-tag')
    <title> محصولات </title>
@endsection

@section('content')
    <section class="p-2 pt-0 bg-white border rounded-md shadow-md md:w-9/12">
        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
            محصولات

            <x-slot name="other">
                <a href="{{ route('customer.dashboard.products.create') }}" class="px-4 py-2 text-gray-600 bg-blue-300 rounded-md">فروش کالا</a>
            </x-slot>
        </x-customer.dashboard.header-text>

        <section class="p-3">

            @forelse ($products as $product)

                <section class="gap-4 py-3 border-b sm:flex last:border-b-0">
                    <section class="flex items-center justify-center">
                        <section class="image-parent standard-image-size">
                            <img src="{{ asset($product->image['index']) }}"
                            class="w-full rounded" alt="">
                        </section>
                    </section>

                    <section class="flex-grow mt-3 ">
                        <h6 class="text-base">{{ strlimit($product->name, 20) }}</h6>

                        @if ($product->auction)
                            <div class="flex items-center gap-1 mt-3 ">
                                مدت مزایده: {{ $product->auction->period->fa }}
                            </div>
                            <div class="flex items-center gap-1 mt-3 ">
                                تاریخ شروع: {{ jFormat($product->auction->start_date, '%d %B، %Y - H:i:s') }}
                            </div>
                            <div class="flex items-center gap-1 mt-3 ">
                               شروع قیمت از: {{ $product->auction->start_price_readable }} تومان
                            </div>
                            <div class="flex items-center gap-1 mt-3 ">
                                تعداد پیشنهادات: {{ $product->auction->suggestions()->count() }}
                            </div>
                        @else
                            @php
                                $exists = collect($product->variants)->pluck('marketable_number')->filter()->isNotEmpty();

                                $priceCollection = collect($product->variants)
                                    ->filter(fn ($variant) => $variant->active)
                                    ->first();

                                if($hasDiscount = $product->amazingSale){
                                    $hasDiscount = (new App\Services\AmazingSaleService)
                                        ->isActive(
                                            $product->amazingSale->start_date,$product->amazingSale->end_date,$product->amazingSale->status
                                        );

                                    $discounted = (new App\Services\DiscountService)
                                        ->calculate(
                                            $priceCollection->price,
                                            $product->amazingSale->percentage
                                        );
                                }
                            @endphp

                            @if ($exists)
                                <div class="flex items-center gap-1 mt-3 ">
                                    <i class="text-2xl icofont-box"></i>
                                    موجود در انبار
                                </div>
                            @else
                                <div class="flex items-center gap-1 mt-3 text-red-600">
                                    <i class="text-lg icofont-close-line"></i>
                                    موجود نیست
                                </div>
                            @endif
                        @endif

                        @if ($product->deliveryIsFree)
                            <div class="flex items-center text-red-600 gap-1 mt-3 ">
                                <i class="text-2xl icofont-track"></i>
                                هزینه ارسال رایگان
                            </div>
                        @else
                            <div class="flex items-center gap-1 mt-3">
                                <i class="text-2xl icofont-track"></i>
                                هزینه ارسال: {{ $product->delivery_amount_readable }}
                            </div>
                        @endif

                        <section class="flex flex-col justify-between gap-6 sm:flex-row mt-9">
                            <section>
                                <x-a class="bg-yellow-600" href="{{ route('customer.dashboard.products.gallery.index', $product->id) }}">
                                    گالری
                                </x-a>
                                <x-a href="{{ route('customer.dashboard.products.edit', $product->id) }}">
                                    ویرایش
                                </x-a>
                                <form action="{{ route('customer.dashboard.products.destroy', $product->id) }}" method="post" class="inline">
                                    @csrf @method('delete')
                                    <x-button type="submit" class="bg-red-600" onclick="confirm(event, 'به طور کامل پاک خواهد شد.', 'py-2 px-1 rounded text-white bg-green-600', 'py-2 px-1 rounded text-white bg-red-600')">
                                        حذف
                                    </x-button>
                                </form>
                            </section>

                            @if (!$product->auction)
                                <div class="flex flex-col sm:items-end">
                                    @if($hasDiscount)
                                        <span class="font-bold line-through">
                                            <span class="text-base"> {{ $priceCollection->price_readable }}</span> تومان
                                        </span>
                                        <span class="text-red-600 ">
                                            <span class="text-lg">
                                                {{ fa_price((int) $discounted) }}
                                            </span>
                                            تومان
                                        </span>
                                    @else
                                        <span>
                                            <span class="text-lg"> {{ $priceCollection->price_readable }} </span>تومان
                                        </span>
                                    @endif
                                </div>
                            @endif
                        </section>
                    </section>
                </section>
            @empty
                <div class="flex items-center justify-center h-full mt-4 font-bold text-gray-300">
                    چیزی برای نمایش وجود ندارد
                </div>
            @endforelse

            <section class="flex justify-center my-4">
                {{ $products->links() }}
            </section>
        </section>
    </section>
@endsection

@section('scripts')
    @include('alerts.sweetalert.confirm')
@endsection

