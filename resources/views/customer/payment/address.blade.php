@extends('customer.layouts.master')

@section('head-tag')
    <title>انتخاب آدرس</title>

    <link rel="stylesheet" href="{{ asset('admin-assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/select2/css/select2.modification.css') }}">
@endsection

@section('content')
    <section>
        <x-customer.dashboard.header-text>
             تکمیل اطلاعات ارسال کالا (آدرس گیرنده، مشخصات گیرنده، نحوه ارسال)
        </x-customer.dashboard.header-text>

        <section class="flex flex-col gap-5 mt-4 md:flex-row">
            <section class="p-3 bg-white border rounded-md shadow-md md:w-9/12">


                <section class="address-info p-3 mt-1 text-sm bg-blue-200 rounded shadow border-y @if(($addresses->isEmpty())) hidden @endif">
                    <i class="p-1 text-lg icofont-info-circle"></i>
                    یک آدرس را انتخاب کنید.
                </section>

                <section class="p-3 choose-address">

                    @forelse ($addresses as $address)
                        <section class="p-2 my-2 border-2 border-gray-300 rounded-md cursor-pointer bg-gray-50 address" data-address-id="{{ $address->id }}">
                            <div class="flex gap-1">
                                <i class="text-lg icofont-location-pin"></i>
                                <div >
                                    آدرس:
                                    {{ $address->address }}
                                </div>
                            </div>

                            <div class="flex gap-1 mt-2">
                                <i class="text-lg icofont-user-alt-7"></i>
                                <div >
                                    گیرنده:
                                    {{ $address->recipient_full_name }}
                                </div>
                            </div>

                            <div class="flex gap-1 mt-2">
                                <i class="text-lg icofont-phone"></i>
                                <div >
                                    موبایل گیرنده:
                                    {{ $address->mobile }}
                                </div>
                            </div>

                            <div class="mt-4">
                                <x-a href="{{ route('customer.payment.editAddress', $address->id) }}">
                                    ویرایش
                                </x-a>
                                <form action="{{ route('customer.dashboard.myAddresses.destroy', $address->id) }}" method="post" class="inline">
                                    @csrf @method('delete')
                                    <x-button type="submit" class="bg-red-600">
                                        حذف
                                    </x-button>
                                </form>
                            </div>
                        </section>
                    @empty
                        <div class="flex items-center justify-center h-full mt-4 font-bold text-gray-300">
                            آدرسی وجود ندارد. آدرس جدید ایجاد کنید
                        </div>
                    @endforelse

                    <div class="mt-20">
                        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
                            ساخت آدرس جدید
                        </x-customer.dashboard.header-text>

                        <form action="{{ route('customer.dashboard.myAddresses.store') }}" method="post" class="p-2 pt-0">
                            @csrf
                            <section class="flex flex-col gap-3 my-4 md:flex-row">
                                <div class="md:w-1/2">
                                    <x-label for="" class="m-2 text-sm">
                                        استان
                                    </x-label>

                                    <x-select id="provinces" name="province_id" class="w-full rtl" dir="rtl">
                                        <option value="">انتخاب</option>

                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" @selected($province->id == old('province_id'))>{{ $province->name }}</option>
                                        @endforeach
                                    </x-select>

                                    @error('province_id')
                                        <div class="error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="md:w-1/2">
                                    <x-label for="" class="m-2 text-sm">
                                        شهر
                                    </x-label>

                                    <x-select id="cities" name="city_id" class="w-full select2 rtl" dir="rtl">
                                        <option value="">انتخاب</option>
                                    </x-select>

                                    @error('city_id')
                                        <div class="error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </section>

                            <div class="my-4">
                                <x-label for="" class="m-2 text-sm">
                                    نشانی
                                </x-label>

                                <x-input type="text" name="address" value="{{ old('address') }}" class="w-full"/>
                                @error('address')
                                    <div class="error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="my-4">
                                <x-label for="" class="m-2 text-sm">
                                    کد پستی
                                </x-label>

                                <x-input type="text" value="{{ old('postal_code') }}" name="postal_code" class="w-full"/>

                                @error('postal_code')
                                    <div class="error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <section class="flex flex-col gap-3 my-4 md:flex-row">
                                <div class="md:w-1/2">
                                    <x-label for="" class="m-2 text-sm">
                                        پلاک
                                    </x-label>

                                    <x-input type="text" value="{{ old('no') }}" name="no" class="w-full"/>

                                    @error('no')
                                        <div class="error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="md:w-1/2">
                                    <x-label for="" class="m-2 text-sm">
                                        واحد
                                    </x-label>

                                    <x-input type="text" name="unit" value="{{ old('unit') }}" class="w-full"/>

                                    @error('unit')
                                        <div class="error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </section>

                            <hr/>

                            <section class="flex flex-col gap-3 my-4 md:flex-row">
                                <div class="md:w-1/2">
                                    <x-label for="" class="m-2 text-sm">
                                        نام گیرنده
                                    </x-label>

                                    <x-input type="text" name="recipient_first_name" value="{{ old('recipient_first_name', auth()->user()->first_name) }}"  class="w-full"/>

                                    @error('recipient_first_name')
                                        <div class="error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="md:w-1/2">
                                    <x-label for="" class="m-2 text-sm">
                                        نام خانوادگی گیرنده
                                    </x-label>

                                    <x-input type="text" name="recipient_last_name" value="{{ old('recipient_last_name', auth()->user()->last_name) }}" class="w-full"/>

                                    @error('recipient_last_name')
                                        <div class="error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </section>

                            <div class="my-4">
                                <x-label for="" class="m-2 text-sm">
                                    شماره موبایل
                                </x-label>

                                <x-input type="text" name="mobile" value="{{ old('mobile', auth()->user()->mobile) }}" class="w-full"/>

                                @error('mobile')
                                    <div class="error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <x-button class="w-full flex justify-center h-[35px] bg-gray-800">
                                ثبت آدرس
                            </x-button>
                        </form>

                    </div>

                </section>

            </section>

            <section class="md:w-3/12">
                <section class="sticky p-5 bg-white border rounded-md shadow-lg top-7">
                    <section class="flex flex-col gap-5">
                        <div class="flex flex-wrap justify-between">
                            <p class="text-gray-600">قیمت کالاها ({{ $totalProductNumber }})</p>
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

                        <x-a href="{{ route('customer.cart.index') }}" class="!bg-yellow-400 !text-gray-700 shadow !tracking-normal h-10 w-full gap-2 flex justify-center">
                            بازگشت به سبد خرید
                        </x-a>

                    </section>
                    <section class="mt-2">

                        <x-a class="!bg-red-600 tracking-normal h-10 w-full flex justify-center complete-payment">تکمیل فرآیند خرید</x-a>

                    </section>
                </section>
            </section>
        </section>
    </section>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.choose-address section.address').on('click', function () {
                $(this).siblings('.address').removeClass('border-green-500')
                    .removeClass('bg-green-200');

                $(this).siblings('.address').find('.choosed').addClass('hidden')

                $(this).addClass('bg-green-200').addClass('border-green-500').find('.choosed').removeClass('hidden')
            })
        })
    </script>

    <script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>

    <script>
        $('#provinces').select2();
        $('#cities').select2();
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
        $(function () {
            if ($('#provinces').val()) {
                insertCities($('#provinces').val(), "{{ old('city_id') }}")
            }

            $('#provinces').change(function () {
                let province_id = $(this).val();

                if (!province_id) {
                    return;
                }

                insertCities(province_id);
            });
        })
    </script>

    <script>
        function insertCities (province_id, active_city_id = null) {
            $('#cities').prop('disabled', true);

            let url = "{{ route('customer.dashboard.myAddresses.cityOfProvince', ':id') }}"
                .replace(':id', province_id)

            $.get({
                url: url,
                success: function (response) {
                    $('#cities').children().remove();
                    $('#cities').append(`
                        <option value="">انتخاب</option>
                    `)

                    Object.entries(response.cities).forEach((city) => {
                        let id = city[1].id;
                        let name = city[1].name;
                        let selected = '';

                        if (active_city_id && active_city_id == id) {
                            selected = 'selected';
                        }

                        $('#cities').append(`
                            <option ${selected} value="${id}">${name}</option>
                        `)
                    });

                    $('#cities').prop('disabled', false);
                },
                error: function () {
                    Toast.fire({
                        icon: 'error',
                        title: 'مشکلی پیش آمده دوباره امتحان کنید'
                    })
                    $('#cities').prop('disabled', false);
                }
            });
        }
    </script>

    <script>
        $(function () {
            $('.complete-payment').click(function () {
                event.preventDefault();

                let addressId = $('.choose-address .bg-green-200');

                if (addressId.length == 0) {
                    $($('.address-info')[0]).removeClass('hidden').removeClass('bg-blue-200').addClass('bg-red-600').addClass('text-white');
                    return;
                }

                window.location.href = "{{ route('customer.payment.code', ':address') }}"
                    .replace(':address', addressId.data('address-id'));
            })
        })
    </script>
@endsection
