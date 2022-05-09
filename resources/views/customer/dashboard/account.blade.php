@extends('customer.dashboard.layouts.master')

@section('head-tag')
    <title> ویرایش حساب </title>
@endsection

@section('content')
    <section class="md:w-9/12 bg-white rounded-md border shadow-md p-2 pt-0">
        <x-customer.dashboard.header-text class="lg:text-lg xl:text-xl">
            ویرایش حساب
        </x-customer.dashboard.header-text>

        <section class="px-3">

            <form action="{{ route('customer.dashboard.editAccount') }}" method="post" class="">
                @csrf @method('put')
                <section class="flex md:flex-row flex-wrap flex-col mt-4">
                    <div class="md:w-1/2 p-1">
                        <x-label for="first_name" class="text-sm m-2">
                                نام
                        </x-label>

                        <x-input type="text" id="first_name" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}" class="w-full"/>
                        @error('first_name')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="md:w-1/2 p-1">
                        <x-label for="last_name" class="text-sm m-2">
                                نام خانوادگی
                        </x-label>

                        <x-input type="text" id="last_name" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}" class="w-full"/>
                        @error('last_name')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="md:w-1/2 p-1">
                        <x-label for="mobile" class="text-sm m-2">
                               شماره تلفن همراه
                        </x-label>

                        <x-input type="text" id="mobile" name="mobile" value="{{ old('mobile', auth()->user()->mobile) }}" class="w-full"/>
                        @error('mobile')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="md:w-1/2 p-1">
                        <x-label for="email" class="text-sm m-2">
                              ایمیل
                        </x-label>

                        <x-input type="text" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="w-full"/>
                        @error('email')
                            <div class="error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </section>

                <div class="p-1">
                    <x-label for="delivery_time_id" class="text-sm m-2">
                            زمان ارسال
                    </x-label>

                    <x-select class="w-full rtl text-sm" name="delivery_time_id" dir="rtl">
                        <option value="">انتخاب</option>

                        @foreach ($delievryTimes as $time)
                            <option
                                value="{{ $time->id }}"
                                @selected(old('delivery_time_id', auth()->user()->delivery_time_id) == $time->id)
                            >{{ $time->time }}</option>
                        @endforeach
                    </x-select>

                    @error('delivery_time_id')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <x-button class="w-full flex justify-center h-[35px] bg-gray-800 mt-2">
                  ویرایش حساب
                </x-button>
            </form>

        </section>
    </section>
@endsection
