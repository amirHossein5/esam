@extends('customer.layouts.master')

@section('head-tag')
    <title> {{ $product->name }} </title>
@endsection

@section('content')
    <div>
        <span class="font-bold"> شاخه:</span>
        @foreach (collect($categories)->reverse() as $categoryName)
            <a href="" class="a-hover">{{ $categoryName }}</a>
            @if (!$loop->last)
                <i class="icofont-rounded-left"></i>
            @endif
        @endforeach
    </div>

    <section class="py-4 mt-4">
        <section class="block gap-10 md:flex">
            <section class="w-full mb-12 md:w-5/12 md:mb-0">

                @if ($product->amazingSale)
                    @if ($product->amazingSale->isActive)
                        <section class="pb-2 text-left">
                            <span
                                class="title show-remaining-time"
                                data-remain-time="{{ $product->amazingSale->end_date->timestamp - now()->timestamp }}"
                            >
                                12:09:08
                            </span>
                        </section>
                    @endif
                @endif

                <section class="relative @if($product->galleries->isEmpty()) h-full flex items-center justify-center  @endif">

                    @if ($product->amazingSale)
                        @if ($product->amazingSale->isActive)
                            <section class="absolute top-0 right-0 z-10 px-2 bg-red-600 sm:p-1 sm:rounded-md">
                                <span class="text-gray-200 md:text-base">
                                    {{ $product->amazingSale->percentage }}٪ تخفیف
                                </span>
                            </section>
                        @endif
                    @endif

                    @if ($product->deliveryIsFree)
                        <section
                            class="absolute top-0 left-0 z-10 flex flex-col items-center gap-2 p-1 text-xs bg-red-600 rounded-md lg:gap-3 sm:p-2">
                            <span class="text-gray-200 ">
                                ارسال رایگان
                            </span>
                            <span class="text-gray-200">
                                به سراسر ایران
                            </span>
                        </section>
                    @endif

                    <x-product.gallery
                        class="relative left-0 right-0 mx-auto"
                        :images="$product->galleries->pluck('image.index')->map(fn ($path) => asset($path))"
                    />
                </section>

            </section>

            <section class="w-full mt-4 md:w-7/12 md:mt-0">
                <div class="pb-2 border-b">
                    <h6 class="mb-3 text-xl font-semibold"> {{ $product->name }} </h6>
                    <p class="text-base text-gray-600">{{ $product->introduction }} </p>
                </div>

                <section class="gap-5 pt-2 xl:flex">
                    <section class="w-full xl:w-7/12">

                        <section class="p-5 mt-4 bg-white border rounded-md shadow-md">

                            @if ($product->auction)
                                {{-- auctions --}}
                                <section class="">
                                    <section class="text-base">
                                        @if ($product->auction->start_date->gt(now()))
                                            <p>زمان تا شروع مزایده:</p>
                                            <div
                                                class="text-base text-center text-red-600 sm:text-right sm:mr-20 show-remaining-time"
                                                data-remain-time="{{ $product->auction->start_date->timestamp - now()->timestamp }}"
                                            >
                                            ۲ روز و ۱۳ ساعت و
                                                ۱۵ دقیقه
                                            </div>
                                        @elseif ($product->auction->end_date->lt(now()))
                                            <p>زمان باقیمانده:</p>
                                            <div
                                                class="text-base text-center text-red-600 sm:text-right sm:mr-20"
                                            >
                                            مزایده به اتمام رسیده است
                                            </div>
                                        @else
                                            <p>زمان باقیمانده:</p>
                                            <div
                                                class="text-base text-center text-red-600 sm:text-right sm:mr-20 show-remaining-time"
                                                data-remain-time="{{ $product->auction->end_date->timestamp - now()->timestamp }}"
                                            >
                                            ۲ روز و ۱۳ ساعت و
                                                ۱۵ دقیقه
                                            </div>
                                        @endif
                                    </section>
                                    <section class="mt-4 text-base">
                                        بالاترین پیشنهاد:
                                        <div class="text-center sm:text-right sm:mr-20">
                                            @if ($product->auction->suggestions->max('suggested_amount'))
                                                <span
                                                    class="text-xl text-red-600"
                                                >
                                                    {{ fa_price($product->auction->suggestions->max('suggested_amount')) }}
                                                </span>
                                                تومان
                                            @else
                                                هنوز پیشنهادی ثبت نشده است
                                            @endif
                                        </div>
                                    </section>
                                    @if ($product->auction->suggestions->isNotEmpty())
                                        <section class="mt-4 text-base">
                                            تعداد پیشنهادات:
                                            <div class="text-center sm:text-right sm:mr-20">
                                                <span class="text-xl ">{{ $product->auction->suggestions->count() }}</span>
                                            </div>
                                        </section>
                                    @endif
                                    <section class="mt-6 text-base">
                                        @if ($product->auction->reservedPrice and $product->auction->reservedPrice <= $product->auction->suggestions->max('suggested_amount'))
                                            <span class="mb-3 text-red-600">
                                                <i class="icofont-lock"></i>
                                                بالاترین پیشنهاد به قیمت رزرو نرسیده است و فروشنده میتواند کالا را ارسال نکند.
                                            </span>
                                        @endif
                                    </section>


                                    <section class="flex flex-col gap-1 mt-6">
                                        @if ($product->auction->isActive)
                                            <a
                                                href="{{ route('customer.product.suggestionForm', $product) }}"
                                                class="block w-full py-2 text-base text-center text-white bg-blue-600 rounded-md toggle-modal"
                                            >
                                                ثبت
                                                پیشنهاد
                                            </a>
                                        @endif
                                        @if (auth()->user()->followingAuctions()->where('auction_id', $product->auction->id)->exists())
                                            <form action="{{ route('customer.product.unfollowAuction', $product) }}" method="post">
                                                @csrf @method('delete')
                                                <button type="submit"
                                                    class="block w-full py-2 text-base text-center text-green-600 bg-gray-200 border rounded-md">
                                                    <i class="icofont-close"></i>
                                                    دنبال نکردن
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('customer.product.followAuction', $product) }}" method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="block w-full py-2 text-base text-center text-white bg-green-600 rounded-md">
                                                    <i class="icofont-eye-alt"></i>
                                                    دنبال کن
                                                </button>
                                            </form>
                                        @endif
                                        <button
                                            class="block w-full py-2 text-base text-center text-white bg-yellow-600 rounded-md toggle-modal"
                                            data-id="auctionTable" data-open="false">جدول پیشنهادات این کالا</button>
                                    </section>

                                    {{-- auction suggestions modal --}}
                                    <section id="auctionTable"
                                        class="modal-container fixed top-0 left-0 right-0 bottom-0 bg-gray-400 bg-opacity-40 overflow-auto hidden  z-[99]">
                                        <section
                                            class="relative  modal top-[5%] -mt-10 bg-white border  mx-auto right-0 left-0 rounded-md shadow-md w-11/12 md:w-10/12 p-3">
                                            <div class="pb-3 mb-3 border-b">
                                                <div class="pb-3 mb-3 border-b">
                                                    <i class="text-3xl text-red-600 cursor-pointer icofont-close-circled close-modal"
                                                        data-id="auctionTable"></i>
                                                </div>
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
                                            </div>
                                        </section>
                                    </section>

                                    <section class="flex flex-col justify-between mt-5 sm:flex-row">
                                        <div>
                                            <span class="text-gray-600">تعداد بازدید:</span>
                                            <span class="text-base ">{{ $product->visitors }}</span>
                                        </div>
                                        <div>
                                            <span class="text-base ">{{ $product->auction->followers()->count() }}</span>
                                            <span class="text-gray-600">دنبال شده</span>
                                        </div>
                                    </section>
                                </section>
                            @else
                                {{-- sell --}}
                                <section class="">
                                    @if ($product->variants->where('marketable_number', '>', '0')->isEmpty())
                                        <section class="text-base text-red-600">
                                            <i class="icofont-close"></i>
                                            این محصول موجود نیست
                                        </section>
                                    @else

                                        <form action="{{ route('customer.cart.store', $product->id) }}" method="post">
                                            @csrf

                                            @if ($product->variants->count() > 1 or $product->variants[0]->selectableAttributes->count() > 0)
                                                <section class="text-base" id="show-product-quantity">
                                                    <section class="exists">
                                                        خرید
                                                        <input type="number" name="number" value="1" class="w-24" id="product-quantity-input">
                                                        عدد از <span class="product-quantity-value">15</span> عدد
                                                    </section>
                                                    @error('number')
                                                        <section class="error">
                                                            {{ $message }}
                                                        </section>
                                                    @enderror
                                                    <section class="hidden text-base text-red-600 not-exists">
                                                        <i class="icofont-close"></i>
                                                        این مشخصه موجود نیست
                                                    </section>
                                                </section>

                                                <section class="pt-2 mt-5">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>مشخصه</th>
                                                                <th> قیمت هر عدد (تومان)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($product->variants as $variant)
                                                                <tr class="@if($variant->marketable_number <= 0) opacity-50 bg-gray-200 @endif">
                                                                    <td>
                                                                        <input
                                                                            type="radio"
                                                                            name="variant_id"
                                                                            value="{{ $variant->id }}"
                                                                            @checked($variant->active === 1)
                                                                            @disabled($variant->marketable_number <= 0)
                                                                            onchange="changeQuantity()"
                                                                            class="product-quantity"
                                                                            data-quantity="{{ $variant->marketable_number }}"
                                                                        >
                                                                    </td>
                                                                    <td class="pr-4">
                                                                        <div class="flex flex-wrap " style="gap: 0.8rem">
                                                                            @foreach ($variant->selectableAttributes as $selectableAttribute)
                                                                                <div>
                                                                                    <span class="text-sm">{{ $selectableAttribute->attribute->name }}</span>:
                                                                                    <span class="text-base">{{ $selectableAttribute->value }}</span>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            if ($product->amazingSale?->isActive) {
                                                                                $discounted = (new App\Services\DiscountService())
                                                                                    ->calculate(
                                                                                        $variant->price,
                                                                                        $product->amazingSale->percentage
                                                                                    );
                                                                            }
                                                                        @endphp

                                                                        @if ($product->amazingSale?->isActive)
                                                                            <span class="text-sm line-through">{{ $variant->price_readable }}</span>
                                                                            <span class="text-xl text-red-600 ">{{ fa_price($discounted) }}</span>
                                                                        @else
                                                                            <span class="text-xl ">{{ $variant->price_readable }}</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </section>
                                            @else
                                                @php
                                                    $marketable_number = $product->variants[0]->marketable_number;

                                                    if ($product->amazingSale?->isActive) {
                                                        $discounted = (new App\Services\DiscountService())
                                                            ->calculate(
                                                                $product->variants[0]->price,
                                                                $product->amazingSale->percentage
                                                            );
                                                    }
                                                @endphp

                                                <section class="text-base">
                                                    خرید
                                                    <input type="number" name="number" value="1" class="w-24">
                                                    عدد از <span class="">{{ $marketable_number }}</span> عدد
                                                </section>
                                                @error('number')
                                                    <section class="error">
                                                        {{ $message }}
                                                    </section>
                                                @enderror

                                                <input type="hidden" name="variant_id" value="{{ $product->variants[0]->id }}">

                                                <section class="pt-4 text-base">
                                                    قیمت هر عدد:
                                                    @if ($product->amazingSale?->isActive)
                                                        <span class="text-sm line-through">{{ $product->variants[0]->price_readable }}</span>
                                                        <span class="text-xl text-red-600 ">{{ fa_price($discounted) }}</span>
                                                    @else
                                                        <span class="text-xl ">{{ $product->variants[0]->price_readable }}</span>
                                                    @endif
                                                    تومان
                                                </section>
                                            @endif
                                            <section class="mt-9">
                                                <button
                                                    class="block w-full py-2 text-base text-center text-white bg-blue-600 rounded-md">خرید</button>
                                                <button
                                                    class="block w-full py-2 mt-1 text-base text-center text-white bg-green-600 rounded-md">اضافه
                                                    کردن به سبد خرید</button>
                                            </section>
                                        </form>
                                    @endif
                                    <section class="mt-2">
                                        <span class="text-gray-600">تعداد بازدید:</span>
                                        <span class="text-base ">{{ $product->visitors }}</span>
                                    </section>
                                </section>
                            @endif
                        </section>

                        <section class="flex pb-2 border-b mt-7">
                            <section class="w-3/12">
                                <p class="text-gray-600">جزئیات ارسال:</p>
                            </section>
                            <section class="w-9/12">
                                <p class="mt-5 text-xs text-gray-600">
                                    @auth
                                        تا {{ $product->user->deliveryTime->time }} کاری
                                    @endauth
                                    @guest
                                        جهت مشاهده زمان نحوه ارسال، وارد <a href="{{ route('customer.auth.loginRegisterForm') }}" class="a-hover">حساب کاربری</a> خود
                                        شوید
                                    @endguest
                                </p>
                            </section>
                        </section>
                    </section>
                    <section class="w-full pt-2 xl:w-5/12">
                        <div class="flex items-center justify-between ">
                            <div>
                                <span class="text-base text-gray-600">شماره کالا: </span>
                                <span class="text-base tracking-wider">{{ $product->id }}</span>
                            </div>
                            <div class='flex'>
                                <div class="relative flex justify-center dropdown">
                                    <i class="p-3 text-2xl text-gray-600 transition cursor-pointer icofont-share hover:bg-gray-200"></i>

                                    <div class="left-0 hidden w-48 p-4 my-2 bg-white border rounded-md shadow-md top-full dropdown-zone"
                                        data-open="false">
                                        <div class="flex flex-wrap justify-center">
                                            <div class="p-3 hover:bg-gray-200">
                                                <a href="https://telegram.me/share/url?url={{ url()->current() }}">
                                                    <i
                                                        class="text-2xl text-gray-600 transition cursor-pointer icofont-telegram">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="p-3 hover:bg-gray-200">
                                                <a href="https://wa.me/?text={{ url()->current() }}">
                                                    <i
                                                        class="text-2xl text-gray-600 transition cursor-pointer icofont-whatsapp">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="p-3 hover:bg-gray-200">
                                                <a href="https://twitter.com/home?status={{ url()->current() }}">
                                                    <i
                                                        class="text-2xl text-gray-600 transition cursor-pointer icofont-twitter">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @auth
                                    @if (auth()->user()->favoriteProducts()->where('product_id', $product->id)->exists())
                                        <form action="{{ route('customer.product.addToFavorites', $product) }}" class="flex " method="post">
                                            @csrf @method('put')
                                            <button>
                                                <i class="p-3 text-2xl text-red-600 transition cursor-pointer icofont-heart hover:bg-gray-200"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('customer.product.addToFavorites', $product) }}" class="flex " method="post">
                                            @csrf @method('put')
                                            <button>
                                                <i class="p-3 text-2xl text-gray-600 cursor-pointer icofont-heart"></i>
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                                @guest
                                    <form action="{{ route('customer.product.addToFavorites', $product) }}" class="flex" method="post">
                                        @csrf @method('put')
                                        <button>
                                            <i class="p-3 text-2xl text-gray-600 cursor-pointer icofont-heart"></i>
                                        </button>
                                    </form>
                                @endguest
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="p-4 bg-white border rounded-md shadow-md">
                                <h6 class="mb-5 text-base text-gray-400">فروشنده این کالا</h6>

                                <div class="flex flex-col gap-3 pb-2 border-b-2 border-gray-600 border-dotted">
                                    <div>
                                        <span>نام کاربری:</span>
                                        <span class="text-base">{{ $product->user->first_name ?? '-' }}</span>
                                    </div>
                                    <div>
                                        <span>تاریخ عضویت:</span>
                                        <span class="text-base">{{ jdate($product->user->created_at)->format('d-m-Y') }}</span>
                                    </div>
                                    <div>
                                        <span>کالاهای در حال فروش:</span>
                                        <span class="text-base">{{ $product->user->products()->count() }}</span>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="flex flex-col pb-2 mb-2 gap-7">
                                        <div>
                                            @auth
                                                @if (auth()->user()->favoriteSellers()->wherePivot('seller_id', $product->user->id)->exists())
                                                    <form method="POST" action="{{ route('customer.product.toggleFavoriteSeller', $product->user->id) }}" class="inline px-4 py-2 bg-gray-200 border rounded-md">
                                                    @csrf @method('put')
                                                        <button class="">
                                                            <i class="text-lg text-red-600 icofont-close"></i>
                                                            فروشنده مورد علاقه
                                                        </button>
                                                    </form>
                                                @else
                                                    <form method="POST" action="{{ route('customer.product.toggleFavoriteSeller', $product->user->id) }}" class="inline px-4 py-2 bg-blue-300 rounded-md">
                                                    @csrf @method('put')
                                                        <button>
                                                            <i class="text-green-600 icofont-plus"></i>
                                                            فروشنده مورد علاقه
                                                        </button>
                                                    </form>
                                                @endif

                                            @endauth

                                            @guest
                                                <form method="POST" action="{{ route('customer.product.toggleFavoriteSeller', $product->user->id) }}" class="inline px-4 py-2 bg-blue-300 rounded-md">
                                                    @csrf @method('put')
                                                    <button>
                                                        <i class="text-green-600 icofont-plus"></i>
                                                        فروشنده مورد علاقه
                                                    </button>
                                                </form>
                                            @endguest
                                        </div>
                                        <div>
                                            <a class="px-4 py-2 bg-blue-300 rounded-md" href="#product-questions">
                                                سوال از فروشنده
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a class="px-4 py-2 bg-blue-300 rounded-md toggle-modal" data-id="reportModal"
                                data-open="false">
                                <i class="text-xl text-red-600 icofont-not-allowed"></i>
                                گزارش تخلف
                            </a>
                        </div>
                    </section>
                </section>
            </section>
        </section>

        <section class="mt-9">
            <div>
                کالای شبیه به این دارید؟ <a href="{{ route('customer.dashboard.products.index') }}" class="a-hover">در ایسام بفروشید</a>
            </div>

            @if ($attributeValuesByAttribute)
                <section class='px-6 py-4 mt-3 bg-white border rounded-md'>
                    <p class="text-lg">مشخصات کالا</p>

                    <section class="mt-3 overflow-x-auto">
                        <section class="border  min-w-[30rem]">
                            @foreach ($attributeValuesByAttribute as $name => $value)
                                <section class="flex p-2 border-b odd:bg-gray-100 last:border-b-0">

                                    <section class="w-4/12">
                                        <p>{{ $name }}</p>
                                    </section>

                                    {{-- because select box attributes just can have one value, and also because of getting all of the values of product, it's array --}}
                                    <section class="w-8/12">
                                        <p>{{ $value[0]['value'] }} </p>
                                    </section>

                                </section>
                            @endforeach

                        </section>
                    </section>

                </section>
            @endif

            <section class='px-6 py-4 mt-3 bg-white border rounded-md drop-list' data-open="true">
                <p class="pb-2 text-lg border-b cursor-pointer drop-list-click-open">
                    <i class="icofont-caret-down"></i>
                    توضیحات کالا
                </p>

                <section class="my-5 prose text-gray-900 drop-list-zone md:prose-lg lg:prose-xl prose-strong:text-base">
                    <p>
                        {!! $product->description !!}
                    </p>
                </section>

            </section>

            <section class='px-6 py-4 mt-3 bg-white border rounded-md drop-list' id="product-questions" data-open="false">
                <p class="pb-2 text-lg border-b cursor-pointer drop-list-click-open">
                    <i class="icofont-caret-left"></i>
                    سوال از فروشنده ({{ $product->questions->count() }})
                </p>

                <section class="hidden my-5 text-gray-900 drop-list-zone">
                    @guest
                        <div class="p-2 bg-gray-200 rounded-md">
                            <a href="{{ route('customer.auth.loginRegisterForm') }}" class="a-hover">
                                برای سوال از فروشنده این کالا وارد حساب کاربری خود شوید.
                            </a>
                            <a href="{{ route('customer.auth.loginRegisterForm') }}" class="a-hover">اگر حساب کاربری ندارید ثبت نام کنید.</a>
                        </div>
                    @endguest

                    @auth
                        <div>
                            <x-a href="{{ route('customer.product.question.create', $product->id) }}" class="">
                                پرسش سوال
                            </x-a>
                        </div>
                    @endauth

                    <section class="mt-6">
                        @forelse ($product->questions as $question)
                            <section class="py-3 border-b last:border-b-0">
                                <section class="flex justify-between">
                                    <div class="text-gray-600">
                                        {{ $question->user->fullName ?? '-' }}

                                        @if ($question->user->id == $product->user->id)
                                            (فروشنده)
                                        @elseif($question->user->id == auth()->id())
                                            (شما)
                                        @endif
                                        -
                                        <span class="">
                                            {{ jdate($question->created_at)->format('d-m-Y H:i:s') }}
                                        </span>
                                    </div>
                                    <div class="text-gray-600">
                                        <div class="flex gap-2">
                                            <x-a href="{{ route('customer.product.question.edit', [$question->id, $product->id]) }}" class="">
                                                ویرایش
                                            </x-a>

                                            <form action="{{ route('customer.product.question.destroy', $question->id) }}" method="post">
                                                @csrf @method('delete')

                                                <x-button type='submit' class="bg-red-600">
                                                    حذف
                                                </x-button>
                                            </form>
                                        </div>
                                    </div>
                                </section>

                                <section class="mt-2">
                                    <p class="text-gray-600">
                                        {{ $question->text }}
                                    </p>
                                </section>
                            </section>
                        @empty
                            <div class="flex items-center justify-center h-full mt-4 font-bold text-gray-300">
                                چیزی برای نمایش وجود ندارد
                            </div>
                        @endforelse
                    </section>
                </section>

            </section>
        </section>

        {{-- related products --}}
        @if ($relatedProducts->isNotEmpty())
                <section class="mt-20">
                <h6 class="title">کالاهای مرتبط</h6>

                <x-product.show
                    type="max-grid-5"
                    id="related-products"
                    :products="$relatedProducts"
                />

            </section>
        @endif
    </section>

    {{-- modals --}}

    <section id="reportModal"
        class="modal-container fixed top-0 left-0 right-0 bottom-0 bg-gray-400 bg-opacity-40 overflow-auto hidden  z-[99]">
        <section
            class="relative  modal top-[5%] -mt-10 bg-white border  mx-auto right-0 left-0 rounded-md shadow-md w-11/12 md:w-6/12 p-3">
            <div class="pb-3 mb-3 border-b">
                <div class="pb-3 mb-3 border-b">
                    <i class="text-3xl text-red-600 cursor-pointer icofont-close-circled close-modal"
                        data-id="reportModal"></i>
                </div>
                <section class="gap-7">
                    <form action="{{ route('customer.product.report', $product->id) }}" method="post" id="report">
                        @csrf
                        <section class="">
                            <div class="mb-5">
                                <div>
                                    <x-label class="mt-4 mb-2">
                                        کالا:
                                    </x-label>
                                </div>
                                <div class="text-base text-center">
                                    Macbook Air
                                </div>
                            </div>
                            <div>
                                <div>
                                    <x-label class="mt-4 mb-2">
                                        موضوع تخلف:
                                    </x-label>
                                </div>
                                <div>
                                    <x-select class="block w-full mt-1 text-sm text-right" name="title" dir="rtl">
                                        @foreach (\App\Models\Report::TITLES as $key => $title)
                                            <option value="{{ $key }}">{{ $title }}</option>
                                        @endforeach
                                    </x-select>

                                    <div class="error title_error"></div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <x-label class="mt-4 mb-2">
                                        نام شما:
                                    </x-label>
                                </div>
                                <div>
                                    <x-input class="block w-full mt-1" type="text" name="name" />

                                    <div class="error name_error"></div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <x-label class="mt-4 mb-2">
                                        ایمیل شما:
                                    </x-label>
                                </div>
                                <div>
                                    <x-input class="block w-full mt-1" type="email" name="email" />

                                    <div class="error email_error"></div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <x-label class="mt-4 mb-2">
                                        توضیحات:
                                    </x-label>
                                </div>
                                <div>
                                    <x-textarea class="block w-full mt-1" name="description" />

                                    <div class="error description_error"></div>
                                </div>
                            </div>
                            <div>
                                <x-button class="flex justify-center w-full py-3 mt-4 bg-red-600 disable-on-ajax">
                                    ارسال
                                </x-button>
                            </div>
                        </section>
                    </form>
                </section>
            </div>
        </section>
    </section>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.toggle-modal').on('click', function() {
                var modalContainer = $(`#${$(this).attr('data-id')}`);
                var modal = $(modalContainer).find('.modal');

                $(modalContainer).fadeToggle(600);

                if (!$(this).data('open')) {
                    $('body').addClass('overflow-hidden');
                    $(modal).animate({
                        marginTop: 0
                    });
                    $(this).data('open', true)
                } else {
                    $('body').removeClass('overflow-hidden');
                    $(modal).animate({
                        marginTop: '-2.5rem'
                    });
                    $(this).data('open', false)
                }
            });
        })

        $('.modal-container').on('click', () => {
            // if is modal (nested click problems)
            if ($(event.target).hasClass('modal-container')) {
                var id = $(event.target).attr('id');

                $('.toggle-modal[data-id=' + id + ']').click();
            }
        })

        $('.close-modal').on('click', function() {
            $('.toggle-modal[data-id=' + $(this).data('id') + ']').click();
        })
    </script>

    <script>
        changeQuantity()

        function changeQuantity() {
            let quantity = $('.product-quantity:checked').data('quantity')

            if (quantity > 0) {
                $('#show-product-quantity .exists').show();
                $('#show-product-quantity .not-exists').hide();
                $('#show-product-quantity .product-quantity-value').text(quantity);
                if(quantity == '1') {
                    $('#show-product-quantity #product-quantity-input').val(1)
                    $('#show-product-quantity #product-quantity-input').prop('disabled', false)
                } else {
                    $('#show-product-quantity #product-quantity-input').prop('disabled', false)
                }
            } else {
                $('#show-product-quantity .exists').hide();
                $('#show-product-quantity .not-exists').show();
            }
        }
    </script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    </script>

    <script>
        $('form#report').submit(function () {
            event.preventDefault();

            $('.disable-on-ajax').prop('disabled', true);
            let formData = new FormData($('form#report')[0]);

            $.ajax({
                type: "post",
                url: $('form#report').attr('action'),
                headers: {
                    "Accept": "application/json"
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('.disable-on-ajax').prop('disabled', false);

                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    })
                    setTimeout(() => {
                        location.reload()
                    }, 1000);
                }, error: function(xhr, status, error) {
                    $('.disable-on-ajax').prop('disabled', false);

                    if (!xhr.responseJSON) {
                        Toast.fire({
                            icon: 'error',
                            title: 'مشکلی پیش آمده دوباره امتحان کنید'
                        })
                    }

                    Object.entries(xhr.responseJSON.errors).forEach((error) => {
                        $('form#report .error').text('')

                        setTimeout(() => {
                            $(`form#report .${error[0]}_error`).text(error[1][0]);
                        }, 100);
                    });
                }
            });
        });
    </script>
@endsection
