@props(['products', 'attributes'])

<section
    {{ $attributes->merge(['class' => "grid grid-cols-1 lg:gap-x-3 gap-x-5 gap-y-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 justify-items-center sm:justify-items-stretch"]) }}>

    @foreach ($products as $product)
        <section class="relative flex flex-col h-full bg-white rounded-md shadow-md">
            @php
                $priceCollection = collect($product->variants)
                    ->filter(fn($variant) => $variant->active)
                    ->first();

                if ($hasDiscount = $product->amazingSale) {
                    $hasDiscount = (new App\Services\AmazingSaleService())->isActive($product->amazingSale->start_date, $product->amazingSale->end_date, $product->amazingSale->status);

                    $discounted = (new App\Services\DiscountService())->calculate($priceCollection->price, $product->amazingSale->percentage);
                }
            @endphp

            @if ($hasDiscount)
                <section class="absolute left-0 top-2 z-[1]">
                    <div class="text-center w-28">
                        <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                            class="absolute z-0 -top-[2px] left-1" alt="">
                        <span class="text-gray-200 text-base z-[2] relative">
                            {{ $product->amazingSale->percentage }}% تخفیف
                        </span>
                    </div>
                </section>
            @endif

            <a href="{{ route('customer.product.item', [$product->id, $product->slug]) }}"
                class="flex items-center justify-center py-2 pointer">
                <section class="image-parent standard-image-size">
                    <img class="rounded lazy" data-src="{{ image($product->image['index']) }}"
                        src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                </section>
            </a>

            <section class="flex flex-col flex-grow">
                <a href="{{ route('customer.product.item', [$product->id, $product->slug]) }}"
                    class="block p-2 text-base a-hover">
                    {{ strlimit($product->name, 20) }}
                </a>
                @if ($product->auction)
                    <section class="flex items-center justify-center px-2 py-4 border-t">
                        <div>
                            <div class="text-center">
                                <p class="text-center">بالاترین پیشنهاد:</p>
                                @if ($product->auction->suggestions->isNotEmpty())
                                    <span class="mt-1 text-xl text-red-600 ">
                                        {{ fa_price($product->auction->suggestions->max('suggested_amount')) }}
                                    </span>
                                    تومان
                                @else
                                    <span class="mt-1">هنوز پیشنهادی ثبت نشده است</span>
                                @endif
                            </div>
                        </div>
                    </section>
                    <section class="flex items-center justify-center px-2 py-4 border-t">
                        <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                        <span class="text-2xl text-red-600">{{ $product->auction->suggestions->count() }}</span>
                    </section>
                    <section class="flex items-center justify-center px-2 py-4 border-t">
                        <div class="text-center">
                            <span class="text-2xl text-red-600 show-remaining-time"
                                data-remain-time="{{ $product->auction->end_date }}">
                            </span>
                        </div>
                    </section>
                @else
                    @if ($hasDiscount)
                        <section class="flex items-center justify-center flex-grow border-t ">
                            <section class="px-2 py-4 ">
                                <div>
                                    <div class="text-center">
                                        <span class="text-xl text-red-600 ">{{ fa_price($discounted) }}</span>
                                        تومان
                                    </div>
                                    <div class="text-center">
                                        <span class="line-through">{{ $priceCollection->price_readable }}</span>
                                    </div>
                                </div>
                            </section>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div class="text-center">
                                <span class="text-2xl text-red-600 show-remaining-time"
                                    data-remain-time="{{ $product->amazingSale->end_date }}">
                                </span>
                            </div>
                        </section>
                    @else
                        <section class="flex justify-center items-center py-4 px-2 border-t min-h-[9rem] flex-grow">
                            <div>
                                <div class="text-center">
                                    <span class="text-xl ">{{ $priceCollection->price_readable }}</span>
                                    تومان
                                </div>
                            </div>
                        </section>
                    @endif
                @endif

            </section>
        </section>
    @endforeach
</section>
