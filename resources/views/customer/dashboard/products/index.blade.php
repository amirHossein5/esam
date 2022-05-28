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
            <x-product.show.vertical :products="$products">
                <x-slot:additionalContent>
                    @verbatim
                        <div class="flex items-center gap-1 mt-3 ">
                            قابل فروش:
                            @if ($product->marketable)
                                <span class="text-green-600">
                                    {{ $product->marketable_readable }}
                                </span>
                            @else
                                <span class="text-red-600">
                                    {{ $product->marketable_readable }}
                                </span>
                            @endif
                        </div>
                    @endverbatim
                </x-slot>

                <x-slot:controls>
                    @verbatim
                        <x-a class="bg-gray-600"
                        href="{{ route('customer.product.item', [$product, $product->slug]) }}">
                            مشاهده
                        </x-a>
                        <form action="{{ route('customer.dashboard.products.changeMarketable', $product) }}"
                            method="post" class="inline">
                            @csrf @method('put')

                            <x-button type="submit" class="bg-green-600"
                                href="{{ route('customer.dashboard.products.changeMarketable', $product->id) }}">
                                تغییر قابل فروش بودن
                            </x-button>
                        </form>
                        <x-a class="bg-yellow-600"
                            href="{{ route('customer.dashboard.products.gallery.index', $product->id) }}">
                            گالری
                        </x-a>
                        <x-a href="{{ route('customer.dashboard.products.edit', $product->id) }}">
                            ویرایش
                        </x-a>
                        <form action="{{ route('customer.dashboard.products.destroy', $product->id) }}" method="post"
                            class="inline">
                            @csrf @method('delete')
                            <x-button type="submit" class="bg-red-600"
                                onclick="confirm(event, 'به طور کامل پاک خواهد شد.', 'py-2 px-1 rounded text-white bg-green-600', 'py-2 px-1 rounded text-white bg-red-600')">
                                حذف
                            </x-button>
                        </form>
                    @endverbatim
                </x-slot:controls>
            </x-product.show.vertical>


            <section class="flex justify-center my-4">
                {{ $products->links() }}
            </section>
        </section>
    </section>
@endsection

@section('scripts')
    @include('alerts.sweetalert.confirm')
@endsection

