@extends('customer.layouts.master')

@section('head-tag')
    <title>ثبت سوال</title>
@endsection

@section('content')
    <section class="p-4">
        <section class="p-5  bg-white border">
            <div class="flex flex-wrap justify-between items-center">
                <p class="text-xl ">ثبت سوال</p>
                <x-a href="{{ route('customer.product.item', [$product->id, $product->slug]) }}" class="bg-gray-600">
                    بازگشت
                </x-a>
            </div>

            <form action="{{ route('customer.product.question.store', $product->id) }}" class="mt-5" method="post">
                @csrf

                <section class="w-full md:w-1/2">
                    <x-label>
                        سوال
                    </x-label>

                    <section class="flex flex-wrap gap-3">
                        <x-input type="text" name="text" class="flex-grow" value="{{ old('text') }}" />

                        <x-button type="submit" class="bg-green-600">
                            ثبت
                        </x-button>
                    </section>

                    @error('text')
                        <section class="error">
                            {{ $message }}
                        </section>
                    @enderror
                </section>
            </form>
        </section>

    </section>
@endsection
