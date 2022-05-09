@extends('customer.dashboard.layouts.master')

@section('head-tag')
    <title> آدرس ها </title>

    <link rel="stylesheet" href="{{ asset('admin-assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/select2/css/select2.modification.css') }}">
@endsection

@section('content')
    <section class="p-2 pt-0 bg-white border rounded-md shadow-md md:w-9/12">
        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
            آدرس های من
        </x-customer.dashboard.header-text>

        <section class="p-3">

            @forelse ($addresses as $address)
                <section class="p-2 my-2 border-2 border-gray-300 rounded-md bg-gray-50 hover:bg-gray-200">
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
                        <x-a href="{{ route('customer.dashboard.myAddresses.edit', $address->id) }}">
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
                    چیزی برای نمایش وجود ندارد
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
@endsection

@section('scripts')
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
@endsection
