@extends('customer.layouts.master')

@section('head-tag')
    <title>ثبت پیشنهاد مزایده</title>
@endsection

@section('content')
    <section class="p-4">
        <section class="p-5  bg-white border">
            <div class="flex flex-wrap justify-between items-center">
                <p class="text-xl ">ثبت پیشنهاد مزایده</p>
                <x-a href="{{ route('customer.product.item', [$product, $product->slug]) }}" class="bg-gray-600">
                    صفحه مزایده
                </x-a>
            </div>

            <form action="{{ route('customer.product.submitSuggestion', $product) }}" class="mt-5" method="post">
                @csrf

                <section class="w-full md:w-1/2">
                    <x-label>
                        قیمت پیشنهادی
                    </x-label>

                    <section class="flex flex-wrap gap-3">
                        <x-input type="text" name="suggested_amount" class="flex-grow" value="{{ old('suggested_amount') }}" />

                        <x-button type="submit" class="bg-green-600">
                            ثبت
                        </x-button>
                    </section>

                    @error('suggested_amount')
                        <section class="error">
                            {{ $message }}
                        </section>
                    @enderror
                </section>
            </form>
        </section>

        <section class="p-5 mt-4 bg-white border">
            <p class="text-xl mb-5">پیشنهاد های قبلی</p>

            @if ($product->auction->suggestions->isNotEmpty())
                <section class="flex-wrap justify-center overflow-x-scroll md:flex">
                    <table class="w-[45rem] rounded-md">
                        <thead>
                            <tr>
                                <th class="px-3 py-2 text-base border">زمان</th>
                                <th class="px-3 py-2 text-base border">بالاترین پیشنهاد (تومان)</th>
                                <th class="px-3 py-2 text-base border">پیشنهاد دهنده</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->auction->suggestions as $suggestion)
                                <tr>
                                    <td class="p-2 text-center border">
                                        <span class="text-base text-gray-600">{{ $suggestion->created_at ? jdate($suggestion->created_at) : '-' }}</span>
                                    </td>
                                    <td class="p-2 text-center border">
                                        <span class="text-base text-gray-600">{{ fa_price($suggestion->suggested_amount) }}</span>
                                    </td>
                                    <td class="p-2 text-center border">
                                        <span class="text-base text-gray-600">{{ $suggestion->user->fullName ?? '-' }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            @else
                <div class="flex items-center justify-center h-full mt-4 font-bold text-gray-300">
                    چیزی برای نمایش وجود ندارد
                </div>
            @endif

        </section>

    </section>
@endsection
