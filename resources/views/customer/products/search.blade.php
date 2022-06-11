@extends('customer.layouts.master')

@section('head-tag')
    <title>جستجو</title>
@endsection

@section('content')
    <section class="p-4">
        <section class="block gap-6 md:flex">
            <section class="w-full md:w-3/12">

                {{-- if didn't choose any group or has children --}}
                @if ($categories->isNotEmpty())
                    <section class="p-3 bg-white border shadow-md">
                        <div class="pb-3 border-b">
                            گروه ها
                        </div>
                        <div class="flex flex-col gap-2 mt-3">
                            @foreach ($categories as $category)
                                <form action="{{ route('customer.product.search') }}" method="get">
                                    {{-- parameters not be remvoe --}}
                                    @foreach (request()->except('category', 'attributes','attribute-values') as $key => $value)
                                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                    @endforeach
                                    <input type="hidden" name="category" value="{{ $category->id }}">
                                    <button class="a-hover">
                                        {{ $category->name }}
                                    </button>
                                </form>
                            @endforeach
                        </div>
                    </section>
                @endif


                <form action="{{ route('customer.product.search') }}" id="search">

                    {{-- parameters not be remvoe --}}
                    @foreach (request()->only('kw', 'category', 'sell-type', 'sort') as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach

                    {{-- if choosed any category group and category has attribute --}}
                    @foreach ($productAttributes as  $attribute)
                        <section class="px-3 pt-3 pb-0 mt-2 bg-white border shadow-md drop-list" data-open="false">
                            <div class="pb-3 border-b cursor-pointer drop-list-click-open">
                                <i class="icofont-caret-down"></i>
                                {{ $attribute->name }}
                            </div>

                            <section class="py-3 drop-list-zone">
                                <section class="flex flex-col gap-1">
                                    @foreach ($attribute->defaultValues as $defaultValue)
                                        <div>
                                            <input
                                                type="checkbox"
                                                name="attribute-values[]"
                                                class="p-2 rounded border"
                                                id="attribute-values-{{ $defaultValue->id }}"
                                                data-attribute-id="{{ $defaultValue->attribute_id }}"
                                                value="{{ $defaultValue->id }}"
                                                @checked(in_array($defaultValue->id, explode(',', request()->get('attribute-values'))))
                                            >

                                            <x-label for="attribute-values-{{ $defaultValue->id }}" class="inline font-semibold text-sm">{{ $defaultValue->value }}</x-label>
                                        </div>
                                    @endforeach
                                </section>
                            </section>
                        </section>
                    @endforeach

                    <section class="p-3 mt-2 bg-white border shadow-md">
                        <div class="pb-3 border-b">
                            بازه قیمت (تومان)
                        </div>
                        <div class="flex flex-col gap-2 mt-3">

                            <section class="flex flex-wrap items-center gap-y-4 ">
                                <section class="flex items-center w-full gap-3 pr-3 sm:w-48 md:w-full">
                                    از
                                    <x-input
                                        type="text"
                                        class="w-full h-10"
                                        name="price-from"
                                        value="{{ request()->get('price-from') }}"
                                    />
                                </section>
                                <section class="flex items-center w-full gap-3 pr-3 sm:w-48 md:w-full">
                                    تا
                                    <x-input
                                        type="text"
                                        class="w-full h-10"
                                        name="price-until"
                                        value="{{ request()->get('price-until') }}"
                                    />
                                </section>
                            </section>

                            <section class="flex flex-col gap-3 py-3 mt-2">
                                <div>
                                    <input
                                        type="checkbox"
                                        class="p-2 rounded border"
                                        name="free-delivery"
                                        id="free-delivery"
                                        @checked(request()->has('free-delivery'))
                                    >
                                    <x-label class="inline mr-1 font-semibold " for="free-delivery">ارسال رایگان</x-label>
                                </div>
                                <div>
                                    <input
                                        type="checkbox"
                                        class="p-2 rounded border"
                                        name="has-discount"
                                        id="has-discount"
                                        @checked(request()->has('has-discount'))
                                    >
                                    <x-label class="inline mr-1 font-semibold" for="has-discount"> تخفیف دارد </x-label>
                                </div>
                                <div class="border-t pt-2">
                                    <input
                                        type="checkbox"
                                        class="p-2 rounded border"
                                        name="active-auctions"
                                        id="active-auctions"
                                        @checked(request()->has('active-auctions'))
                                    >
                                    <x-label class="inline mr-1 font-semibold" for="active-auctions"> مزایده های فعال </x-label>
                                </div>
                                <div class="">
                                    <input
                                        type="checkbox"
                                        class="p-2 rounded border"
                                        name="product-exists"
                                        id="product-exists"
                                        @checked(request()->has('product-exists'))
                                    >
                                    <x-label class="inline mr-1 font-semibold" for="product-exists"> محصول موجود باشد </x-label>
                                </div>
                            </section>
                        </div>
                    </section>

                    <x-button class="mt-2 bg-green-600 w-full flex justify-center gap-1 md:py-4">
                        <i class="icofont-filter"></i>
                        فیلتر
                    </x-button>
                </form>

                {{-- removing filters --}}
                @if (request()->except('sort', 'category', 'kw'))
                    <section class="flex flex-wrap gap-1 mt-10">
                        <a href="{{ route('customer.product.search') }}"
                            class="flex items-center gap-2 px-4 py-2 text-xs font-semibold text-white transition bg-gray-800 border rounded-md focus:outline-none focus:ring ring-gray-300 ">
                            <i class="text-2xl text-red-600 icofont-delete"></i>
                            <span>
                                حذف همه فیلتر ها
                            </span>
                        </a>
                    </section>
                @endif

            </section>

            <section class="w-full md:w-9/12 md:mt-0 mt-7">
                <section class="flex flex-wrap items-center gap-10 p-3 bg-white border">
                    <section class="flex border">
                        <a
                            href="{{ route('customer.product.search', request()->except('sell-type', 'sort') + ['sell-type' => 'typical']) }}"
                            class="px-6 py-3 border-l rounded-r @if(request()->get('sell-type') == 'typical') bg-blue-600 text-white @endif"
                        >
                            فروش عادی
                        </a>
                        <a
                            href="{{ route('customer.product.search', request()->except('sell-type', 'sort') + ['sell-type' => 'auction']) }}"
                            class="px-6 py-3 border-l  @if(request()->get('sell-type') == 'auction') bg-blue-600 text-white @endif"
                        >
                            مزایده
                        </a>
                        <a
                            href="{{ route('customer.product.search', request()->except('sell-type', 'sort')) }}"
                            class="px-6 py-3 rounded-l @if(!request()->has('sell-type')) bg-blue-600 text-white @endif"
                        >
                            هردو
                        </a>
                    </section>

                    <section>
                        <form action="{{ route('customer.product.search') }}">
                            {{-- parameters not be remvoe --}}
                            @foreach (request()->except('sort') as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach

                            ترتیب:
                            <x-select class="text-sm pl-8 rtl" name="sort" onchange="$(this).parent('form').submit()">
                                <option
                                    value=""
                                >
                                    بهترین نتیجه
                                </option>
                                <option
                                    value="oldest"
                                    @selected(request()->get('sort') == 'oldest')
                                >
                                    قدیمی ترین
                                </option>
                                <option
                                    value="newest"
                                    @selected(request()->get('sort') == 'newest')
                                >
                                    جدیدترین
                                </option>
                                <option
                                    value="least-expensive"
                                    @selected(request()->get('sort') == 'least-expensive')
                                >
                                    ارزان ترین
                                </option>
                                <option
                                    value="most-expensive"
                                    @selected(request()->get('sort') == 'most-expensive')
                                >
                                    گران ترین
                                </option>
                                @if (request('sell-type') == 'auction')
                                    <option
                                        value="last-remaining-auctions"
                                        @selected(request()->get('sort') == 'last-remaining-auctions')
                                    >
                                        مزایدات رو به اتمام
                                    </option>
                                @endif
                            </x-select>
                        </form>
                    </section>
                </section>

                <section class="p-4 mt-1 bg-white border rounded-md shadow-md">
                    <p class="text-red-600 ">تعداد کالاها : <span>{{ $filteredProducts->total() }} </span></p>
                    @if ($breadcrumbCategories)
                        <p class="mt-4">
                            <section class="flex gap-2">
                                <span>در:</span>
                                <a href="{{ route('customer.product.search', request()->except('category', 'attributes','attribute-values')) }}" class="a-hover">همه گروه ها</a>
                                <section class="parents flex flex-row-reverse gap-2">
                                    @include('customer.layouts.breadcrumb-categories', [
                                        'parent' => $breadcrumbCategories->parent
                                    ])
                                </section>
                                <section>
                                    <i class="icofont-rounded-left"></i>
                                    <a href="{{
                                        route(
                                            'customer.product.search',
                                            ['category' => $breadcrumbCategories->id] +
                                            request()->except('category', 'attributes','attribute-values')
                                        )
                                        }}" class="a-hover">{{ $breadcrumbCategories->name }}</a>
                                </section>
                            </section>
                        </p>
                    @endif
                </section>
                <section>
                    <section class="mt-6">

                        @if ($filteredProducts->isEmpty())
                            <div class="flex items-center justify-center h-full mt-4 font-bold text-gray-300">
                                چیزی برای نمایش وجود ندارد
                            </div>
                        @else
                            <x-product.show type='max-grid-4' :products="$filteredProducts" />
                        @endif

                        <section class="flex justify-center mt-8 ">
                            {{ $filteredProducts->withQueryString()->links() }}
                        </section>
                    </section>
                </section>

            </section>
        </section>
    </section>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('form#search').on('submit', function () {
                $('input[name="attribute-values[]"]').prop('disabled', true);

                let attributes = '';
                let values = '';

                $('input[name="attribute-values[]"]').filter(':checked').each((key,input) => {
                    attributes += ',' + $(input).data('attribute-id')
                    values += ',' + $(input).val()
                })

                $(this).append(`
                    <input type="hidden" name="attributes" value="${attributes.slice(1)}">

                    <input type="hidden" name="attribute-values" value="${values.slice(1)}">
                `)
            })
        })
    </script>
@endsection
