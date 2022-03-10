@extends('app.layouts.master')

@section('head-tag')
    <title> Macbook Air </title>
@endsection

@section('content')
    <div>
        <span class="font-bold"> شاخه:</span>
        <a href="" class="a-hover">لکامپیوتر و شبکه لپ تاپ</a>
        <i class="icofont-rounded-left"></i>
        <a href="" class="a-hover">لپتاپ</a>
    </div>

    <section class="py-4 mt-4">
        <section class="block md:flex gap-9">
            <section class="w-full md:w-5/12 ">

                <section class="pb-2 text-left">
                    <span class="title">
                        12:09:08
                    </span>
                </section>

                <section class="relative">

                    <section class="absolute top-0 right-0 z-10 px-2 bg-red-600 sm:p-1 sm:rounded-md">
                        <span class="text-gray-200 md:text-base">
                            ۱٪ تخفیف
                        </span>
                    </section>

                    <section class="absolute top-0 left-0 z-10 flex flex-col items-center gap-2 p-1 text-xs bg-red-600 rounded-md lg:gap-3 sm:p-2">
                        <span class="text-gray-200 ">
                            ارسال رایگان
                        </span>
                        <span class="text-gray-200">
                        به سراسر ایران
                        </span>
                    </section>

                    <x-product.gallery class="relative left-0 right-0 mx-auto" :images="[
                            asset('app-assets/images/saffir_40300-22063852!3.jpg'),
                            asset('app-assets/images/saffir_440300-22063852!2.jpg'),
                            asset('app-assets/images/saffir_200-22063852!3.jpg'),
                            asset('app-assets/images/saffir_340300-22063852!1.jpg'),
                            asset('app-assets/images/saffir_200-22063852!3.jpg'),
                            asset('app-assets/images/saffir_440300-22063852!2.jpg'),
                            asset('app-assets/images/saffir_340300-22063852!1.jpg'),
                        ]" />
                </section>

            </section>

            <section class="w-full mt-4 md:w-7/12 md:mt-0">
                <div class="pb-2 border-b">
                    <h6 class="mb-3 text-xl font-semibold"> Macbook Air </h6>
                    <p class="text-base text-gray-600"> mid 2013 </p>
                </div>

                <section class="gap-5 pt-2 xl:flex">
                    <section class="w-full xl:w-7/12">
                        <div>
                            <span class="text-gray-600"> وضعیت کالا: </span>
                            <span>دست دوم</span>
                        </div>

                        <section class="p-5 mt-4 bg-white border rounded-md shadow-md">

                            {{-- auctions --}}
                            <section>
                                <section class="text-base">
                                    <p>زمان باقیمانده:</p>
                                    <div class="text-base text-center text-red-600 sm:text-right sm:mr-20">۲ روز و ۱۳ ساعت و ۱۵ دقیقه</div>
                                </section>
                                <section class="mt-4 text-base">
                                    بالاترین پیشنهاد:
                                    <div class="text-center sm:text-right sm:mr-20">
                                        <span class="text-xl text-red-600 ">81,1515,1</span>
                                        تومان
                                    </div>
                                </section>
                                <section class="mt-4 text-base">
                                    تعداد پیشنهادات:
                                    <div class="text-center sm:text-right sm:mr-20">
                                        <span class="text-xl ">215</span>
                                    </div>
                                </section>
                                <section class="mt-6 text-base">
                                    <span class="text-red-600">
                                        <i class="icofont-lock"></i>
                                        بالاترین پیشنهاد به قیمت رزرو نرسیده است و فروشنده میتواند کالا را ارسال نکند.
                                    </span>
                                </section>


                                <section class="flex flex-col gap-1 mt-9">
                                    <a href="" class="block w-full py-2 text-base text-center text-white bg-blue-600 rounded-md">ثبت پیشنهاد</a>
                                    <a href="" class="block w-full py-2 text-base text-center text-white bg-green-600 rounded-md">
                                        <i class="icofont-eye-alt"></i>
                                        دنبال کن
                                    </a>
                                    <button class="block w-full py-2 text-base text-center text-white bg-yellow-600 rounded-md toggle-modal" data-id="auctionTable" data-open="false" >جدول پیشنهادات این کالا</button>
                                </section>

                                <section class="flex flex-col justify-between mt-5 sm:flex-row">
                                    <div>
                                        <span class="text-gray-600">تعداد بازدید:</span>
                                        <span class="text-base ">1032135</span>
                                    </div>
                                    <div>
                                        <span class="text-base ">50</span>
                                        <span class="text-gray-600">دنبال شده</span>
                                    </div>
                                </section>
                            </section>

                            {{-- sell --}}
                            <section class="hidden">
                                <section class="text-base">
                                    خرید
                                    <input type="number" value="1" class="w-24">
                                    عدد از ۱۵ عدد
                                </section>
                                <section class="mt-2 text-base">
                                    قیمت هر عدد:
                                    <span class="text-sm line-through">15,000,000</span>
                                    <span class="text-xl text-red-600 ">81,1515,1</span>
                                    تومان
                                </section>
                                <section class="pt-2 mt-5 border-t">
                                    <div class="text-base ">
                                        رنگ:
                                    </div>
                                    <div class="flex flex-wrap gap-4 mt-2">
                                        <button class="flex items-center justify-center gap-1 px-2 py-1 border-2 rounded-md">
                                            <span style="background-color: black" class="inline-block w-5 h-5 rounded-full"></span>
                                            <span class="text-sm text-gray-600">
                                                مشکی
                                            </span>
                                        </button>
                                        <button class="flex items-center justify-center gap-1 px-2 py-1 border-2 border-green-600 rounded-md">
                                            <span style="background-color: black" class="inline-block w-5 h-5 rounded-full"></span>
                                            <span class="text-sm text-gray-600">
                                                مشکی
                                            </span>
                                        </button>

                                    </div>
                                    <section class="pt-2 mt-5 border-t">
                                        <div class="text-base">سایز:</div>
                                        <div class="mt-2">
                                            <x-select dir="rtl" class='block w-full'>
                                                <option value="">43</option>
                                                <option value="">43</option>
                                                <option value="">43</option>
                                            </x-select>
                                        </div>
                                    </section>
                                </section>


                                <section class="mt-9">
                                    <a href="" class="block w-full py-2 text-base text-center text-white bg-blue-600 rounded-md">خرید</a>
                                    <a href="" class="block w-full py-2 mt-1 text-base text-center text-white bg-green-600 rounded-md">اضافه کردن به سبد خرید</a>
                                </section>
                                <section class="mt-2">
                                    <span class="text-gray-600">تعداد بازدید:</span>
                                    <span class="text-base ">1032135</span>
                                </section>
                            </section>
                        </section>

                        <section class="flex pb-2 border-b mt-7">
                            <section class="w-3/12">
                                <p class="text-gray-600">جزئیات ارسال:</p>
                            </section>
                            <section class="w-9/12">
                                <p class="mt-5 text-xs text-gray-600">
                                    جهت مشاهده زمان نحوه ارسال، وارد <a href="" class="a-hover">حساب کاربری</a> خود
                                    شوید
                                </p>
                            </section>
                        </section>
                    </section>
                    <section class="w-full pt-2 xl:w-5/12">
                        <div class="flex items-center justify-between ">
                            <div>
                                <span class="text-base text-gray-600">شماره کالا: </span>
                                <span class="text-base tracking-wider">22055951</span>
                            </div>
                            <div class='flex'>
                                <div class="relative flex justify-center dropdown">
                                    <i
                                        class="p-3 text-2xl text-gray-600 transition cursor-pointer icofont-share hover:bg-gray-200"></i>

                                    <div class="left-0 hidden w-48 p-4 my-2 bg-white border rounded-md shadow-md top-full dropdown-zone"
                                        data-open="false">
                                        <div class="flex flex-wrap justify-center">
                                            <div class="p-3 hover:bg-gray-200">
                                                <a href="">
                                                    <i
                                                        class="text-2xl text-gray-600 transition cursor-pointer icofont-share">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="p-3 hover:bg-gray-200">
                                                <a href="">
                                                    <i
                                                        class="text-2xl text-gray-600 transition cursor-pointer icofont-share">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="p-3 hover:bg-gray-200">
                                                <a href="">
                                                    <i
                                                        class="text-2xl text-gray-600 transition cursor-pointer icofont-share">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="p-3 hover:bg-gray-200">
                                                <a href="">
                                                    <i
                                                        class="text-2xl text-gray-600 transition cursor-pointer icofont-share">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="p-3 hover:bg-gray-200">
                                                <a href="">
                                                    <i
                                                        class="text-2xl text-gray-600 transition cursor-pointer icofont-share">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <i class="p-3 text-2xl text-gray-600 cursor-pointer icofont-heart"></i> --}}
                                    <i
                                        class="p-3 text-2xl text-red-600 transition cursor-pointer icofont-heart hover:bg-gray-200"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="p-4 bg-white border rounded-md shadow-md">
                                <h6 class="mb-5 text-base text-gray-400">فروشنده این کالا</h6>

                                <div class="flex flex-col gap-3 pb-2 border-b-2 border-gray-600 border-dotted">
                                    <div>
                                        <span>نام کاربری:</span>
                                        <span class="text-base">saffir 7</span>
                                    </div>
                                    <div>
                                        <span>تاریخ عضویت:</span>
                                        <span class="text-base">1391/02/30</span>
                                    </div>
                                    <div>
                                        <span>تعداد خریداران قبلی</span>
                                        <span class="text-base">1</span>
                                    </div>
                                    <div>
                                        <span>کالاهای در حال فروش:</span>
                                        <span class="text-base">1</span>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="flex flex-col pb-2 mb-2 gap-7">
                                        <div>
                                            <a class="px-4 py-2 bg-blue-300 rounded-md">
                                                <i class="text-green-600 icofont-plus"></i>
                                                فروشنده مورد علاقه
                                            </a>
                                        </div>
                                        <div>
                                            <a class="px-4 py-2 bg-blue-300 rounded-md">
                                                سوال از فروشنده
                                            </a>
                                        </div>
                                        <div>
                                            <a class="px-4 py-2 bg-blue-300 rounded-md">
                                                مشاهده کالاهای دیگر فروشنده
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a class="px-4 py-2 bg-blue-300 rounded-md toggle-modal" data-id="reportModal" data-open="false">
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
                کالای شبیه به این دارید؟ <a href="" class="a-hover">در ایسام بفروشید</a>
            </div>

            <section class='px-6 py-4 mt-3 bg-white border rounded-md'>
                <p class="text-lg">مشخصات کالا</p>

                <section class="mt-3 overflow-x-auto">
                    <section class="border  min-w-[30rem]">
                        <section class="flex p-2 border-b odd:bg-gray-100 last:border-b-0">

                            <section class="w-4/12">
                                <p>نوع</p>
                            </section>

                            <section class="w-8/12">
                                <p>پ تاپ (نوت بوک) - Laptop </p>
                            </section>

                        </section>

                        <section class="flex p-2 border-b odd:bg-gray-100 last:border-b-0">

                            <section class="w-4/12">
                                <p>نوع</p>
                            </section>

                            <section class="w-8/12">
                                <p>پ تاپ (نوت بوک) - Laptop </p>
                            </section>

                        </section>

                        <section class="flex p-2 border-b odd:bg-gray-100 last:border-b-0">

                            <section class="w-4/12">
                                <p>نوع</p>
                            </section>

                            <section class="w-8/12">
                                <p>پ تاپ (نوت بوک) - Laptop </p>
                            </section>

                        </section>

                        <section class="flex p-2 border-b odd:bg-gray-100 last:border-b-0">

                            <section class="w-4/12">
                                <p>نوع</p>
                            </section>

                            <section class="w-8/12">
                                <p>پ تاپ (نوت بوک) - Laptop </p>
                            </section>

                        </section>

                        <section class="flex p-2 border-b odd:bg-gray-100 last:border-b-0">

                            <section class="w-4/12">
                                <p>نوع</p>
                            </section>

                            <section class="w-8/12">
                                <p>پ تاپ (نوت بوک) - Laptop </p>
                            </section>

                        </section>

                        <section class="flex p-2 border-b odd:bg-gray-100 last:border-b-0">

                            <section class="w-4/12">
                                <p>نوع</p>
                            </section>

                            <section class="w-8/12">
                                <p>پ تاپ (نوت بوک) - Laptop </p>
                            </section>

                        </section>
                    </section>
                </section>

            </section>

            <section class='px-6 py-4 mt-3 bg-white border rounded-md drop-list' data-open="true">
                <p class="pb-2 text-lg border-b cursor-pointer drop-list-click-open">
                    <i class="icofont-caret-down"></i>
                    توضیحات کالا
                </p>

                <section class="my-5 text-gray-900 drop-list-zone">
                    <p>
                        مشکل فنی ندارد . سلامت باتری در تهیه این آگهی 77 درصد سایکل باتری 568 . همیچیز فابریک چیزی عوض نشده . از لحاظ ظاهری تمیز فقط بدنش گوشش لک داره که توی عکس ها مشخصه اما در کل خریدار عزیز شما 3 4 تا خش یا نقطه کوچک هم در نظر بگیر که اگر از چشم من چیزی پنهان موند مشکلی پیش نیاد. کاملا اپدیت هست . سوال یا عکس بیشتری نیاز بود در خدمتم
                    </p>
                </section>

            </section>

            <section class='px-6 py-4 mt-3 bg-white border rounded-md drop-list' data-open="false">
                <p class="pb-2 text-lg border-b cursor-pointer drop-list-click-open">
                    <i class="icofont-caret-left"></i>
                    سوال از فروشنده (۱۳)
                </p>

                <section class="hidden my-5 text-gray-900 drop-list-zone">
                    <div class="p-2 bg-gray-200 rounded-md">
                        <a href="" class="a-hover">
                            برای سوال از فروشنده این کالا وارد حساب کاربری خود شوید.
                        </a>
                        <a href="" class="a-hover">اگر حساب کاربری ندارید ثبت نام کنید.</a>
                    </div>

                    <section class="mt-6">
                        <section class="py-3 border-b last:border-b-0">
                            <section class="flex justify-between">
                                <div class="text-gray-600">
                                    M...k
                                </div>
                                <div class="text-gray-600">
                                    00:02 1400/12/12
                                </div>
                            </section>

                            <section class="mt-2">
                                <p class="text-gray-600">
                                    سلام مدلش 86 هست ولی اطلاعات فنی رو نمی دن چون ماشین بسیار خاص و کلکسیونی هست
                                </p>
                            </section>
                        </section>
                        <section class="py-3 border-b last:border-b-0">
                            <section class="flex justify-between">
                                <div class="text-gray-600">
                                    M...k
                                </div>
                                <div class="text-gray-600">
                                    00:02 1400/12/12
                                </div>
                            </section>

                            <section class="mt-2">
                                <p class="text-gray-600">
                                    سلام مدلش 86 هست ولی اطلاعات فنی رو نمی دن چون ماشین بسیار خاص و کلکسیونی هست
                                </p>
                            </section>
                        </section>
                        <section class="py-3 border-b last:border-b-0">
                            <section class="flex justify-between">
                                <div class="text-gray-600">
                                    M...k
                                </div>
                                <div class="text-gray-600">
                                    00:02 1400/12/12
                                </div>
                            </section>

                            <section class="mt-2">
                                <p class="text-gray-600">
                                    سلام مدلش 86 هست ولی اطلاعات فنی رو نمی دن چون ماشین بسیار خاص و کلکسیونی هست
                                </p>
                            </section>
                        </section>
                        <section class="py-3 border-b last:border-b-0">
                            <section class="flex justify-between">
                                <div class="text-gray-600">
                                    M...k
                                </div>
                                <div class="text-gray-600">
                                    00:02 1400/12/12
                                </div>
                            </section>

                            <section class="mt-2">
                                <p class="text-gray-600">
                                    سلام مدلش 86 هست ولی اطلاعات فنی رو نمی دن چون ماشین بسیار خاص و کلکسیونی هست
                                </p>
                            </section>
                        </section>
                        <section class="py-3 border-b last:border-b-0">
                            <section class="flex justify-between">
                                <div class="text-gray-600">
                                    M...k
                                </div>
                                <div class="text-gray-600">
                                    00:02 1400/12/12
                                </div>
                            </section>

                            <section class="mt-2">
                                <p class="text-gray-600">
                                    سلام مدلش 86 هست ولی اطلاعات فنی رو نمی دن چون ماشین بسیار خاص و کلکسیونی هست
                                </p>
                            </section>
                        </section>
                    </section>
                </section>

            </section>
        </section>

        {{-- related products --}}
        <section class="mt-20">
            <h6 class="title">کالاهای مرتبط</h6>

            <section class="grid grid-cols-1 gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 justify-items-center">

                {{-- for typical sell --}}
                <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">
                    <section class="absolute left-0 top-2">
                        <div class="text-center w-28">
                            <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                                class="absolute z-0 -top-[2px] left-1" alt="">
                            <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                        </div>
                    </section>

                    <a href="" class="flex items-center justify-center py-2 pointer">
                        <section class="">
                            <img class="rounded lazy"
                                data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                        </section>
                    </a>
                    <section class="mt-2">
                        <a href="" class="block p-2 text-base a-hover">
                            گرافیک asus gtx 1050 ti 4g
                        </a>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div>
                                <div class="text-center">
                                    <span class="text-xl text-red-600 ">81,1515,1</span>
                                    تومان
                                </div>
                                <div class="text-center">
                                    <span class="line-through">81,1515,1</span>
                                </div>
                            </div>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div class="text-center">
                                <span class="text-2xl text-red-600">41:11:09</span>
                            </div>
                        </section>
                    </section>
                </section>

                {{-- for auction --}}
                <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">

                    <a href="" class="flex items-center justify-center py-2 pointer">
                        <section class="">
                            <img class="rounded lazy"
                                data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                        </section>
                    </a>
                    <section class="mt-2">
                        <a href="" class="block p-2 text-base a-hover">
                            گرافیک asus gtx 1050 ti 4g
                        </a>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div>
                                <div class="text-center">
                                    <p>بالاترین پیشنهاد:</p>
                                    <span class="mt-1 text-xl text-red-600 ">81,1515,1</span>
                                    تومان
                                </div>
                            </div>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                            <span class="text-2xl text-red-600">20</span>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div class="text-center">
                                <span class="text-2xl text-red-600">41:11:09</span>
                            </div>
                        </section>
                    </section>
                </section>

                <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">
                    <section class="absolute left-0 top-2">
                        <div class="text-center w-28">
                            <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                                class="absolute z-0 -top-[2px] left-1" alt="">
                            <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                        </div>
                    </section>

                    <a href="" class="flex items-center justify-center py-2 pointer">
                        <section class="">
                            <img class="rounded lazy"
                                data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                        </section>
                    </a>
                    <section class="mt-2">
                        <a href="" class="block p-2 text-base a-hover">
                            گرافیک asus gtx 1050 ti 4g
                        </a>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div>
                                <div class="text-center">
                                    <span class="text-xl text-red-600 ">81,1515,1</span>
                                    تومان
                                </div>
                                <div class="text-center">
                                    <span class="line-through">81,1515,1</span>
                                </div>
                            </div>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div class="text-center">
                                <span class="text-2xl text-red-600">41:11:09</span>
                            </div>
                        </section>
                    </section>
                </section>

                <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">
                    <section class="absolute left-0 top-2">
                        <div class="text-center w-28">
                            <img src="{{ asset('app-assets/images/discountLabel.webp') }}"
                                class="absolute z-0 -top-[2px] left-1" alt="">
                            <span class="text-gray-200 text-base z-[2] relative">15% تخفیف</span>
                        </div>
                    </section>

                    <a href="" class="flex items-center justify-center py-2 pointer">
                        <section class="">
                            <img class="rounded lazy"
                                data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                        </section>
                    </a>
                    <section class="mt-2">
                        <a href="" class="block p-2 text-base a-hover">
                            گرافیک asus gtx 1050 ti 4g
                        </a>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div>
                                <div class="text-center">
                                    <span class="text-xl text-red-600 ">81,1515,1</span>
                                    تومان
                                </div>
                                <div class="text-center">
                                    <span class="line-through">81,1515,1</span>
                                </div>
                            </div>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div class="text-center">
                                <span class="text-2xl text-red-600">41:11:09</span>
                            </div>
                        </section>
                    </section>
                </section>

                <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">

                    <a href="" class="flex items-center justify-center py-2 pointer">
                        <section class="">
                            <img class="rounded lazy"
                                data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                        </section>
                    </a>
                    <section class="mt-2">
                        <a href="" class="block p-2 text-base a-hover">
                            گرافیک asus gtx 1050 ti 4g
                        </a>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div>
                                <div class="text-center">
                                    <p>بالاترین پیشنهاد:</p>
                                    <span class="mt-1 text-xl text-red-600 ">81,1515,1</span>
                                    تومان
                                </div>
                            </div>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                            <span class="text-2xl text-red-600">20</span>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div class="text-center">
                                <span class="text-2xl text-red-600">41:11:09</span>
                            </div>
                        </section>
                    </section>
                </section>

                <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">

                    <a href="" class="flex items-center justify-center py-2 pointer">
                        <section class="">
                            <img class="rounded lazy"
                                data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                        </section>
                    </a>
                    <section class="mt-2">
                        <a href="" class="block p-2 text-base a-hover">
                            گرافیک asus gtx 1050 ti 4g
                        </a>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div>
                                <div class="text-center">
                                    <p>بالاترین پیشنهاد:</p>
                                    <span class="mt-1 text-xl text-red-600 ">81,1515,1</span>
                                    تومان
                                </div>
                            </div>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                            <span class="text-2xl text-red-600">20</span>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div class="text-center">
                                <span class="text-2xl text-red-600">41:11:09</span>
                            </div>
                        </section>
                    </section>
                </section>

                <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">

                    <a href="" class="flex items-center justify-center py-2 pointer">
                        <section class="">
                            <img class="rounded lazy"
                                data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                        </section>
                    </a>
                    <section class="mt-2">
                        <a href="" class="block p-2 text-base a-hover">
                            گرافیک asus gtx 1050 ti 4g
                        </a>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div>
                                <div class="text-center">
                                    <p>بالاترین پیشنهاد:</p>
                                    <span class="mt-1 text-xl text-red-600 ">81,1515,1</span>
                                    تومان
                                </div>
                            </div>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                            <span class="text-2xl text-red-600">20</span>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div class="text-center">
                                <span class="text-2xl text-red-600">41:11:09</span>
                            </div>
                        </section>
                    </section>
                </section>

                <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">

                    <a href="" class="flex items-center justify-center py-2 pointer">
                        <section class="">
                            <img class="rounded lazy"
                                data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                        </section>
                    </a>
                    <section class="mt-2">
                        <a href="" class="block p-2 text-base a-hover">
                            گرافیک asus gtx 1050 ti 4g
                        </a>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div>
                                <div class="text-center">
                                    <p>بالاترین پیشنهاد:</p>
                                    <span class="mt-1 text-xl text-red-600 ">81,1515,1</span>
                                    تومان
                                </div>
                            </div>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                            <span class="text-2xl text-red-600">20</span>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div class="text-center">
                                <span class="text-2xl text-red-600">41:11:09</span>
                            </div>
                        </section>
                    </section>
                </section>

                <section class="relative bg-white rounded-md shadow-md max-w-[22rem]">

                    <a href="" class="flex items-center justify-center py-2 pointer">
                        <section class="">
                            <img class="rounded lazy"
                                data-src="{{ asset('app-assets/images/14932837_1645698796_340_th.jpg') }}"
                                src="{{ asset('app-assets/images/product-carousel-loader.jpg') }}" alt="">
                        </section>
                    </a>
                    <section class="mt-2">
                        <a href="" class="block p-2 text-base a-hover">
                            گرافیک asus gtx 1050 ti 4g
                        </a>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div>
                                <div class="text-center">
                                    <p>بالاترین پیشنهاد:</p>
                                    <span class="mt-1 text-xl text-red-600 ">81,1515,1</span>
                                    تومان
                                </div>
                            </div>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <img src="{{ asset('app-assets/images/Offer.webp') }}" class="!w-8 m-1" alt="">
                            <span class="text-2xl text-red-600">20</span>
                        </section>
                        <section class="flex items-center justify-center px-2 py-4 border-t">
                            <div class="text-center">
                                <span class="text-2xl text-red-600">41:11:09</span>
                            </div>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>

    {{-- modals --}}
    <section id="auctionTable" class="modal-container fixed top-0 left-0 right-0 bottom-0 bg-gray-400 bg-opacity-40 overflow-auto hidden  z-[99]" >
        <section
            class="relative  modal top-[5%] -mt-10 bg-white border  mx-auto right-0 left-0 rounded-md shadow-md w-11/12 md:w-10/12 p-3">
            <div class="pb-3 mb-3 border-b">
                <div class="pb-3 mb-3 border-b">
                    <i class="text-3xl text-red-600 cursor-pointer icofont-close-circled close-modal" data-id="auctionTable"></i>
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
                            <tr>
                                <td class="p-2 text-center border">
                                    <span class="text-base text-gray-600">1400/12/18</span>   <span class="text-base text-gray-600">14:24</span>
                                </td>
                                <td class="p-2 text-center border">
                                    <span class="text-base text-gray-600">35,000,000,000</span>
                                </td>
                                <td class="p-2 text-center border">
                                    <span class="text-base text-gray-600">flatter</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>
    </section>

    <section id="reportModal" class="modal-container fixed top-0 left-0 right-0 bottom-0 bg-gray-400 bg-opacity-40 overflow-auto hidden  z-[99]" >
        <section
            class="relative  modal top-[5%] -mt-10 bg-white border  mx-auto right-0 left-0 rounded-md shadow-md w-11/12 md:w-10/12 p-3">
            <div class="pb-3 mb-3 border-b">
                <div class="pb-3 mb-3 border-b">
                    <i class="text-3xl text-red-600 cursor-pointer icofont-close-circled close-modal" data-id="reportModal"></i>
                </div>
                <section class="md:flex gap-7">
                    <section class="pb-3 mb-3 border-b md:w-1/2">
                        <div class="pb-3 mb-3 border-b">
                            <p>در صورت مشاهده هرگونه تخلف، با ارسال این فرم، ما را در جریان موضوع قرار دهید.</p>
                            <p class="text-red-600"> وارد کردن توضیحات در مورد تخلف الزامیست </p>
                        </div>
                        <div>
                            <p>در صورتی که شما خریدار این کالا هستید برای گزارش مشکل خود بر روی دکمه زیر کلیک کنید </p>
                            <a class="block px-2 py-2 my-4 text-sm text-center text-gray-200 bg-red-600 rounded-md">
                                من خریدار این کالا هستم و مشکل دارم
                            </a>
                        </div>
                    </section>
                    <section class="md:w-1/2">
                        <div class="mb-5">
                            <div>
                                <x-label class="mt-3 mb-2">
                                    کالا:
                                </x-label>
                            </div>
                            <div class="text-base text-center">
                                Macbook Air
                            </div>
                        </div>
                        <div>
                            <div>
                                <x-label class="mt-3 mb-2">
                                    موضوع تخلف:
                                </x-label>
                            </div>
                            <div>
                                <x-select class="block w-full mt-1 text-sm text-right" dir="rtl">
                                    <option value="">کالا ممنوع و غیر مجاز است</option>
                                    <option value="">کالا ممنوع و غیر مجاز است</option>
                                    <option value="">کالا ممنوع و غیر مجاز است</option>
                                </x-select>
                            </div>
                        </div>
                        <div>
                            <div>
                                <x-label class="mt-3 mb-2">
                                    نام شما:
                                </x-label>
                            </div>
                            <div>
                                <x-input class="block w-full mt-1" type="text" />
                            </div>
                        </div>
                        <div>
                            <div>
                                <x-label class="mt-3 mb-2">
                                    ایمیل شما:
                                </x-label>
                            </div>
                            <div>
                                <x-input class="block w-full mt-1" type="email" />
                            </div>
                        </div>
                        <div>
                            <div>
                                <x-label class="mt-3 mb-2">
                                    توضیحات:
                                </x-label>
                            </div>
                            <div>
                                <x-textarea class="block w-full mt-1" />
                            </div>
                        </div>
                        <div>
                            <x-button class="flex justify-center w-full py-3 mt-4">
                                ارسال
                            </x-button>
                        </div>
                    </section>
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
                var id  = $(event.target).attr('id');

                $('.toggle-modal[data-id='+ id +']').click();
            }
        })

        $('.close-modal').on('click', function () {
            $('.toggle-modal[data-id='+ $(this).data('id') +']').click();
        })
    </script>
@endsection
