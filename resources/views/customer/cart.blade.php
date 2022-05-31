@extends('customer.layouts.master')

@section('head-tag')
    <title>سبد خرید</title>
@endsection

@section('content')
    <section>
        <x-customer.dashboard.header-text>
            سبد خرید شما
        </x-customer.dashboard.header-text>

        <section class="@if($cartItems->isNotEmpty())  flex flex-col @endif gap-5 mt-4 md:flex-row">
            <section class="p-3 bg-white border rounded-md shadow-md md:w-9/12 ">

                @forelse ($cartItems as $key => $item)
                    <section class="gap-6 py-4 border-b sm:flex last:border-b-0">
                        <section class="flex items-center justify-center">
                            <img src="{{ image($item->product->image['index']) }}"
                                class="w-full max-w-xs rounded sm:w-48" alt="">
                        </section>

                        <section class="flex-grow mt-3 ">
                            <a href="{{ route('customer.product.item', [$item->product->id, $item->product->slug]) }}" class="text-base a-hover">{{ $item->product->name }}</a>

                            @error('cartItems.number')
                                <section class="error">
                                    دوباره امتحان کنید
                                </section>
                            @enderror
                            @error('cartItems.ids')
                                <section class="error">
                                    دوباره امتحان کنید
                                </section>
                            @enderror

                            @error('cartItems.ids.'. $item->id)
                                <section class="error">
                                    {{ $message }}
                                </section>
                            @enderror

                            @if ($item->variant->marketable_number > 0)
                                <div class="flex items-center gap-1 mt-3 ">
                                    <i class="text-2xl icofont-box"></i>
                                    موجود در انبار
                                    <span class="text-2xl font-semibold text-green-600">{{ $item->variant->marketable_number }}</span>
                                    عدد
                                </div>
                            @else
                                <div class="flex items-center gap-1 mt-3 text-red-600">
                                    <i class="text-lg icofont-close-line"></i>
                                        موجود نیست
                                </div>
                            @endif

                            @if ($item->variant->selectableAttributes->isNotEmpty())
                                <div class="pt-4 ">
                                    @foreach ($item->variant->selectableAttributes as $selectableAttribute)
                                        <div class="my-2 border-b">
                                            <span >{{ $selectableAttribute->attribute->name }}:</span>
                                            <span>{{ $selectableAttribute->value }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <section class="flex flex-col justify-between gap-6 sm:flex-row mt-9">

                                <section class="flex flex-col gap-4">
                                    @if ($item->variant->marketable_number > 0)
                                        <section class="flex product-number">
                                            <x-button type="button"
                                                class="flex justify-center w-8 text-lg bg-red-600 rounded-l-none mines">-</x-button>

                                            <x-input
                                                type="text"
                                                data-cart-id="{{ $item->id }}"
                                                class="w-12 rounded-none number product-quantity"
                                                max="{{ $item->variant->marketable_number }}"
                                                value="{{ old('cartItems.number.' . $item->id, $item->number) }}"
                                            />

                                            <x-button type="button"
                                                class="flex justify-center w-8 text-lg bg-blue-500 rounded-r-none plus">+</x-button>
                                        </section>
                                    @else
                                        <input
                                            type="hidden"
                                            data-cart-id="{{ $item->id }}"
                                            class="product-quantity"
                                            value="{{ $item->number }}"
                                        >
                                    @endif

                                    @error('cartItems.number.'. $item->id)
                                        <section class="error">
                                            {{ $message }}
                                        </section>
                                    @enderror

                                    <form action="{{ route('customer.cart.destroy', $item->id) }}" method="post">
                                        @csrf @method('delete')
                                        <x-button class="tracking-normal bg-red-600">حذف از سبد خرید</x-button>
                                    </form>
                                </section>

                                @php
                                    if ($item->product->amazingSale?->isActive) {
                                        $discounted = (new App\Services\DiscountService())
                                            ->calculate(
                                                $item->variant->price,
                                                $item->product->amazingSale->percentage
                                            );
                                    }
                                @endphp

                                <div class="flex flex-col sm:items-end">
                                    @if ($item->product->amazingSale?->isActive)
                                        <span class="text-sm line-through">{{ $item->variant->price_readable }} تومان </span>
                                        <span class="text-red-600">
                                            <span class="text-xl ">{{ fa_price($discounted) }} </span>تومان
                                        </span>
                                    @else
                                        <span class="">
                                            <span class="text-xl ">{{ $item->variant->price_readable }} </span>تومان
                                        </span>
                                    @endif
                                    <span>
                                        هزینه ارسال: <span class="text-lg"> {{ $item->product->delivery_amount_readable }} </span>تومان
                                    </span>
                                </div>
                            </section>
                        </section>
                    </section>
                @empty
                    <div class="flex items-center justify-center h-full mt-4 mb-10 font-bold text-gray-300">
                        سبد خرید شما خالی است
                    </div>
                @endforelse

            </section>

            @if ($cartItems->isNotEmpty())
                <section class="md:w-3/12">
                    <section class="sticky p-5 bg-white border rounded-md shadow-lg top-7">
                        <section class="flex flex-col gap-5">
                            <div class="flex flex-wrap justify-between">
                                <p class="text-gray-600">قیمت کالاها ({{ $cartItems->sum('number') }})</p>
                                <p><span class="text-lg">{{ fa_price($totalAmount) }}</span> تومان</p>
                            </div>

                            @if ($totalDiscountAmount)
                                <div class="flex flex-wrap justify-between">
                                    <p class="text-gray-600">تخفیف کالاها</p>
                                    <p class="text-red-600"><span class="text-lg">{{ fa_price($totalDiscountAmount) }}</span> تومان</p>
                                </div>
                            @endif

                            <div class="flex flex-wrap justify-between">
                                <p class="text-gray-600">هزینه ارسال</p>
                                <p><span class="text-lg">{{ fa_price($totalDeliveryAmount) }}</span> تومان</p>
                            </div>
                        </section>

                        <hr class="my-5">

                        <div class="flex flex-wrap justify-between">
                            <p class="text-gray-600">جمع سبد خرید</p>
                            <p><span class="text-lg">{{ fa_price($finalAmount) }}</span> تومان</p>
                        </div>

                        <section class="mt-9">
                            <i class="text-lg icofont-info-circle"></i>
                            <span class="text-xs">
                                کاربر گرامی خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را
                                انتخاب کنید.
                            </span>
                        </section>

                        <section class="mt-6">
                            <form action="{{ route('customer.cart.update') }}" method="post" id="update-cart">
                                @csrf @method('put')
                                <x-button class="refresh-cart !bg-yellow-400 !text-gray-700 shadow !tracking-normal h-10 w-full gap-2 flex justify-center">
                                    <i class="icofont-refresh"></i>
                                    بروزرسانی سبد خرید
                                </x-button>
                            </form>
                        </section>
                        <section class="mt-2">
                            <x-a href="{{ route('customer.payment.address') }}" class="!bg-red-600 tracking-normal h-10 w-full flex justify-center">تکمیل فرآیند خرید</x-a>
                        </section>
                    </section>
                </section>
            @endif
        </section>
    </section>
@endsection

@section('scripts')
    @error('swal-error')
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

            Toast.fire({
                icon: 'error',
                title: "{{ $message }}"
            })
        </script>
    @enderror

    <script>
        $(function() {
            $('.product-number .mines').on('click', function() {
                let numberInput = $(this).siblings('.number');
                let number = parseInt($(this).siblings('.number').val());
                let mines = $(this);
                let plus = $(this).siblings('.plus');

                $(plus).prop('disabled', false);

                if (number - 1 === 1) {
                    $(mines).prop('disabled', true);
                }

                if (number - 1 <= 0) {
                    $(mines).prop('disabled', true);
                    $(numberInput).val(1);
                } else {
                    $(numberInput).val(number - 1);
                }
            });

            $('.product-number .plus').on('click', function() {
                let numberInput = $(this).siblings('.number');
                let number = parseInt($(this).siblings('.number').val());
                let maxNumber = parseInt($(this).siblings('.number').attr('max'));
                let plus = $(this);
                let mines = $(this).siblings('.mines');

                $(mines).prop('disabled', false);

                if (number + 1 === maxNumber) {
                    $(plus).prop('disabled', true);
                }

                if (maxNumber >= number + 1) {
                    $(numberInput).val(number + 1);
                } else {
                    $(numberInput).val(maxNumber);
                    $(plus).prop('disabled', true);
                }
            });

            $('.product-number .number').focusout(function() {
                let numberInput = $(this);
                let number = parseInt($(this).val());
                let maxNumber = parseInt($(this).attr('max'));
                let mines = $(this).siblings('.mines');
                let plus = $(this).siblings('.plus');

                if (number <= 0) {
                    $(numberInput).val(1);
                    $(mines).prop('disabled', true);
                    $(plus).prop('disabled', false);
                } else if (maxNumber >= number) {
                    $(mines).prop('disabled', false);
                    $(plus).prop('disabled', false);
                    $(numberInput).val(number);
                } else {
                    $(plus).prop('disabled', true);
                    $(mines).prop('disabled', false);
                    $(numberInput).val(maxNumber);
                }
            });
        })
    </script>

    <script>
        $(function () {
            $('button.refresh-cart').click(function () {
                event.preventDefault();

                $('.product-quantity').each((key, item) => {
                    $(this).closest('form').append(`
                        <input type="hidden" name="cartItems[ids][${$(item).data('cart-id')}]" value="${$(item).data('cart-id')}">
                        <input type="hidden" name="cartItems[number][${$(item).data('cart-id')}]" value="${$(item).val()}">
                    `)
                })

                $(this).closest('form').submit()
            })
        })
    </script>
@endsection
