@extends('customer.dashboard.layouts.master')

@section('head-tag')
    <title>
        گالری کالای ({{ $product->name }})
    </title>
@endsection

@section('content')
    <section class="p-2 pt-0 bg-white border rounded-md shadow-md md:w-9/12">
        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
            گالری محصول

            <x-slot name="other">
                <h5>
                    نام کالا: {{ strlimit($product->name, 15) }}
                </h5>
            </x-slot>
        </x-customer.dashboard.header-text>

        <section class="p-3">
            <div class="mt-2">
                <a href="{{ route('customer.dashboard.products.index') }}"
                    class="p-2 px-3 bg-green-600 rounded text-white">محصولات</a>
            </div>

            <section class="flex justify-between items-center mt-4 mb-3 border-b border-t pb-2">
                <form action="{{ route('customer.dashboard.products.gallery.store', $product->id) }}"
                    enctype="multipart/form-data" method="post" class="m-2">
                    @csrf

                    <x-input type="file" multiple name="images[]" id=""/>
                    <x-button type="submit" class="bg-green-600">آپلود</x-button>

                    @error('images.*')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </form>
            </section>

            <section class="flex flex-wrap">
                @foreach ($product->galleries as $gallery)
                    <section class="flex relative m-3">
                        <section
                            class="flex justify-center items-center cursor-pointer bg-red-600 rounded-lg absolute h-8 w-8 overflow-hidden -top-1 ">
                            <form
                                action="{{ route('customer.dashboard.products.gallery.destroy', ['product' => $product->id, 'gallery' => $gallery->id]) }}"
                                 method="post"
                            >
                                @csrf @method('delete')
                                <button class="flex justify-center items-center w-10 h-10">
                                    <i class="text-3xl text-white cursor-pointer icofont-close-circled"></i>
                                </button>
                            </form>
                        </section>
                        <section class="image-parent standard-image-size">
                            <img src="{{ asset($gallery->image['index']) }}" height="90" alt="">
                        </section>
                    </section>
                @endforeach
            </section>
        </section>
    </section>
@endsection
