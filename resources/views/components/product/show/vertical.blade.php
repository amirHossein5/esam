@props(['products'])

@forelse ($products as $product)

    <section class="gap-4 py-3 border-b sm:flex last:border-b-0">
        <section class="flex items-center justify-center">
            <section class="image-parent standard-image-size">
                <img src="{{ asset($product->image['index']) }}" class="w-full rounded" alt="">
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
                    $exists = $product->variants->where('marketable_number', '>', '0')->isNotEmpty();

                    $priceCollection = collect($product->variants)
                        ->filter(fn($variant) => $variant->active)
                        ->first();

                    if ($hasDiscount = $product->amazingSale) {
                        $hasDiscount = (new App\Services\AmazingSaleService())->isActive($product->amazingSale->start_date, $product->amazingSale->end_date, $product->amazingSale->status);

                        $discounted = (new App\Services\DiscountService())->calculate($priceCollection->price, $product->amazingSale->percentage);
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
                <div class="flex items-center gap-1 mt-3 text-red-600 ">
                    <i class="text-2xl icofont-track"></i>
                    هزینه ارسال رایگان
                </div>
            @else
                <div class="flex items-center gap-1 mt-3">
                    <i class="text-2xl icofont-track"></i>
                    هزینه ارسال: {{ $product->delivery_amount_readable }}
                </div>
            @endif

            {!! eval('?>'.Blade::compileString($additionalContent ?? '')) !!}

            <section class="flex flex-col justify-between gap-6 sm:flex-row mt-9">
                <section class="flex flex-wrap items-center gap-4 md:gap-2 sm:gap-3">
                    {!! eval('?>'.Blade::compileString($controls ?? '')) !!}
                </section>

                @if (!$product->auction)
                    <div class="flex flex-col sm:items-end">
                        @if ($hasDiscount)
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
