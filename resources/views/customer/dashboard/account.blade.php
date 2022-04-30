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

            <form action="" method="post" class="">

                <section class="flex md:flex-row flex-wrap flex-col my-4">
                    <div class="md:w-1/2 p-1">
                        <x-label for="" class="text-sm m-2">
                                نام
                        </x-label>

                        <x-input type="text" class="w-full"/>

                    </div>

                    <div class="md:w-1/2 p-1">
                        <x-label for="" class="text-sm m-2">
                                نام خانوادگی
                        </x-label>

                        <x-input type="text" class="w-full"/>

                    </div>

                    <div class="md:w-1/2 p-1">
                        <x-label for="" class="text-sm m-2">
                               شماره تلفن همراه
                        </x-label>

                        <x-input type="text" class="w-full"/>

                    </div>

                    <div class="md:w-1/2 p-1">
                        <x-label for="" class="text-sm m-2">
                              ایمیل
                        </x-label>

                        <x-input type="text" class="w-full"/>

                    </div>
                </section>

                <x-button class="w-full flex justify-center h-[35px] bg-gray-800">
                  ویرایش حساب
                </x-button>
            </form>

        </section>
    </section>
@endsection
