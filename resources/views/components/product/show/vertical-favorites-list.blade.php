@props(['products'])


@forelse ($products as $favorite)

    <section class="gap-4 py-3 border-b sm:flex last:border-b-0">
        <section class="flex items-center justify-center">
            <section class="image-parent standard-image-size">
                <img src="{{ asset($favorite->product->image['index']) }}" class="w-full rounded" alt="">
            </section>
        </section>

        <section class="flex-grow mt-3 ">
            <h6 class="text-base">{{ strlimit($favorite->product->name, 20) }}</h6>

            @if ($favorite->product->auction)
                <div class="flex items-center gap-1 mt-3 ">
                    مدت مزایده: {{ $favorite->product->auction->period->fa }}
                </div>
                <div class="flex items-center gap-1 mt-3 ">
                    تاریخ شروع: {{ jFormat($favorite->product->auction->start_date, '%d %B، %Y - H:i:s') }}
                </div>
                <div class="flex items-center gap-1 mt-3 ">
                    شروع قیمت از: {{ $favorite->product->auction->start_price_readable }} تومان
                </div>
                <div class="flex items-center gap-1 mt-3 ">
                    تعداد پیشنهادات: {{ $favorite->product->auction->suggestions()->count() }}
                </div>
            @else
                @php
                    $exists = $favorite->product->variants->where('marketable_number', '>', '0')->isNotEmpty();

                    $priceCollection = collect($favorite->product->variants)
                        ->filter(fn($variant) => $variant->active)
                        ->first();

                    if ($hasDiscount = $favorite->product->amazingSale) {
                        $hasDiscount = (new App\Services\AmazingSaleService())->isActive($favorite->product->amazingSale->start_date, $favorite->product->amazingSale->end_date, $favorite->product->amazingSale->status);

                        $discounted = (new App\Services\DiscountService())->calculate($priceCollection->price, $favorite->product->amazingSale->percentage);
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

            @if ($favorite->product->deliveryIsFree)
                <div class="flex items-center gap-1 mt-3 text-red-600 ">
                    <i class="text-2xl icofont-track"></i>
                    هزینه ارسال رایگان
                </div>
            @else
                <div class="flex items-center gap-1 mt-3">
                    <i class="text-2xl icofont-track"></i>
                    هزینه ارسال: {{ $favorite->product->delivery_amount_readable }}
                </div>
            @endif

            <section class="flex flex-col justify-between gap-6 sm:flex-row mt-9">
                <section class="flex flex-wrap items-center gap-4 md:gap-2 sm:gap-3">
                    {!! eval('?>'.Blade::compileString($controls ?? '')) !!}
                </section>

                @if (!$favorite->product->auction)
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
