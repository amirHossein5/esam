@extends('customer.dashboard.layouts.master')

@section('head-tag')
    <title> لیست علاقه مندی </title>
@endsection

@section('content')
    <section class="p-3 pt-0 bg-white border rounded-md shadow-md md:w-9/12">
        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
            لیست علاقه مندی
        </x-customer.dashboard.header-text>

        <section>

            <x-product.show.vertical-favorites-list :products="$favoriteProducts">
                <x-slot:controls>
                    @verbatim
                        <x-a class="bg-gray-600" href="{{ route('customer.product.item', [$favorite->product, $favorite->product->slug]) }}">
                                مشاهده
                        </x-a>

                        <form action="{{ route('customer.product.removeFavorite', $favorite->id) }}" method="post" class="inline">
                            @csrf @method('delete')
                            <x-button type="submit" class="bg-red-600" >
                                حذف از لیست علاقه مندی
                            </x-button>
                        </form>
                    @endverbatim
                </x-slot:controls>
            </x-product.show.vertical-favorites-list>


            <section class="flex justify-center my-4">
                {{ $favoriteProducts->links() }}
            </section>

        </section>
    </section>
@endsection
