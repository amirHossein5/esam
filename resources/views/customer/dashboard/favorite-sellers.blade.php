@extends('customer.dashboard.layouts.master')

@section('head-tag')
    <title> فروشنده های مورد علاقه </title>
@endsection

@section('content')
    <section class="p-2 pt-0 bg-white border rounded-md shadow-md md:w-9/12">
        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
            فروشنده های مورد علاقه
        </x-customer.dashboard.header-text>

        <section>

            @forelse ($sellers as $seller)
                <section class="px-3 py-6 border-b first:pt-3 last:border-b-0">
                    <div>
                        <span>نام کاربری:</span>
                        <span class="text-base">{{ $seller->first_name ?? '-' }}</span>
                    </div>
                    <div>
                        <span>تاریخ عضویت:</span>
                        <span class="text-base">{{ jdate($seller->created_at)->format('d-m-Y') }}</span>
                    </div>
                    <div>
                        <span>کالاهای در حال فروش:</span>
                        <span class="text-base">{{ $seller->products()->count() }}</span>
                    </div>
                    <form action="{{ route('customer.dashboard.destroyFavoriteSeller', $seller) }}" method="post">
                        @csrf @method('delete')
                        <x-button class="bg-red-600 mt-4">
                            حذف
                        </x-button>
                    </form>
                </section>
            @empty
                <div class="flex items-center justify-center h-full mt-4 font-bold text-gray-300">
                    چیزی برای نمایش وجود ندارد
                </div>
            @endforelse


            <section class="flex justify-center my-4">
                {{ $sellers->links() }}
            </section>
        </section>
    </section>
@endsection
