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
            <section class="md:w-5/12 w-full">
                <x-product.gallery class="relative right-0 left-0 mx-auto" :images="[
                        asset('app-assets/images/saffir_40300-22063852!3.jpg'),
                        asset('app-assets/images/saffir_200-22063852!3.jpg'),
                        asset('app-assets/images/saffir_440300-22063852!2.jpg'),
                        asset('app-assets/images/saffir_340300-22063852!1.jpg'),
                        asset('app-assets/images/saffir_200-22063852!3.jpg'),
                        asset('app-assets/images/saffir_440300-22063852!2.jpg'),
                        asset('app-assets/images/saffir_340300-22063852!1.jpg'),
                    ]" />
            </section>

            <section class="md:w-7/12 w-full">
                <div class="border-b pb-2">
                    <h6 class="font-semibold text-xl mb-3"> Macbook Air </h6>
                    <p class="text-gray-600 text-base"> mid 2013 </p>
                </div>

                <section class="xl:flex pt-2 gap-5">
                    <section class="w-full xl:w-7/12">
                        <div>
                            <span class="text-gray-600"> وضعیت کالا: </span>
                            <span>دست دوم</span>
                        </div>

                        <section class="bg-white border rounded-md shadow-md p-5 mt-4">

                            

                        </section>

                        <section class="flex mt-7 border-b pb-2">
                            <section class="w-3/12">
                                <p class="text-gray-600">جزئیات ارسال:</p>
                            </section>
                            <section class="w-9/12">
                                <p class="text-gray-600 text-xs mt-5">
                                    جهت مشاهده زمان نحوه ارسال، وارد <a href="" class="a-hover">حساب کاربری</a> خود
                                    شوید
                                </p>
                            </section>
                        </section>
                    </section>
                    <section class="w-full xl:w-5/12 pt-2">
                        <div class=" flex justify-between items-center">
                            <div>
                                <span class="text-gray-600 text-base">شماره کالا: </span>
                                <span class="text-base tracking-wider">22055951</span>
                            </div>
                            <div class='flex'>
                                <div class="dropdown relative flex justify-center">
                                    <i
                                        class="icofont-share text-2xl cursor-pointer  p-3 text-gray-600 hover:bg-gray-200 transition"></i>

                                    <div class="top-full my-2 w-48 hidden shadow-md left-0  p-4 rounded-md border bg-white dropdown-zone"
                                        data-open="false">
                                        <div class="flex flex-wrap justify-center">
                                            <div class="p-3 hover:bg-gray-200">
                                                <a href="">
                                                    <i
                                                        class="icofont-share text-2xl cursor-pointer text-gray-600 transition">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="p-3 hover:bg-gray-200">
                                                <a href="">
                                                    <i
                                                        class="icofont-share text-2xl cursor-pointer text-gray-600 transition">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="p-3 hover:bg-gray-200">
                                                <a href="">
                                                    <i
                                                        class="icofont-share text-2xl cursor-pointer text-gray-600 transition">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="p-3 hover:bg-gray-200">
                                                <a href="">
                                                    <i
                                                        class="icofont-share text-2xl cursor-pointer text-gray-600 transition">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="p-3 hover:bg-gray-200">
                                                <a href="">
                                                    <i
                                                        class="icofont-share text-2xl cursor-pointer text-gray-600 transition">
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <i class="icofont-heart text-2xl cursor-pointer p-3 text-gray-600"></i> --}}
                                    <i
                                        class="icofont-heart text-2xl cursor-pointer  p-3 text-red-600 hover:bg-gray-200 transition"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="p-4 bg-white border rounded-md shadow-md">
                                <h6 class="text-base text-gray-400 mb-5">فروشنده این کالا</h6>

                                <div class="flex flex-col gap-3 border-b-2 border-gray-600 border-dotted pb-2">
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
                                    <div class="flex flex-col gap-7 pb-2 mb-2">
                                        <div>
                                            <a class="bg-blue-300 px-4 py-2 rounded-md">
                                                <i class="icofont-plus text-green-600"></i>
                                                فروشنده مورد علاقه
                                            </a>
                                        </div>
                                        <div>
                                            <a class="bg-blue-300 px-4 py-2 rounded-md">
                                                سوال از فروشنده
                                            </a>
                                        </div>
                                        <div>
                                            <a class="bg-blue-300 px-4 py-2 rounded-md">
                                                مشاهده کالاهای دیگر فروشنده
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a class="bg-blue-300 px-4 py-2 rounded-md toggle-modal" data-open="false">
                                <i class="icofont-not-allowed text-red-600 text-xl"></i>
                                گزارش تخلف
                            </a>
                        </div>
                    </section>
                </section>
            </section>
        </section>
    </section>

    <section class="modal-container fixed top-0 left-0 right-0 bottom-0 bg-gray-400 bg-opacity-20 overflow-auto hidden  z-[99]" >
        <section
            class="relative  modal top-[5%] -mt-10 bg-white border  mx-auto right-0 left-0 rounded-md shadow-md w-11/12 md:w-10/12 p-3">
            <div class="border-b pb-3 mb-3">
                <div class="border-b pb-3 mb-3">
                    <i class="icofont-close-circled text-3xl text-red-600 cursor-pointer close-modal"></i>
                </div>
                <section class="md:flex gap-7">
                    <section class="border-b mb-3 pb-3 md:w-1/2">
                        <div class="border-b pb-3 mb-3">
                            <p>در صورت مشاهده هرگونه تخلف، با ارسال این فرم، ما را در جریان موضوع قرار دهید.</p>
                            <p class="text-red-600"> وارد کردن توضیحات در مورد تخلف الزامیست </p>
                        </div>
                        <div>
                            <p>در صورتی که شما خریدار این کالا هستید برای گزارش مشکل خود بر روی دکمه زیر کلیک کنید </p>
                            <a class="my-4 bg-red-600 px-2 text-sm py-2 rounded-md text-gray-200 block text-center">
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
                                <x-select class="block mt-1 w-full text-right text-sm" dir="rtl">
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
                                <x-input class="block mt-1 w-full" type="text" />
                            </div>
                        </div>
                        <div>
                            <div>
                                <x-label class="mt-3 mb-2">
                                    ایمیل شما:
                                </x-label>
                            </div>
                            <div>
                                <x-input class="block mt-1 w-full" type="email" />
                            </div>
                        </div>
                        <div>
                            <div>
                                <x-label class="mt-3 mb-2">
                                    توضیحات:
                                </x-label>
                            </div>
                            <div>
                                <x-textarea class="block mt-1 w-full" />
                            </div>
                        </div>
                        <div>
                            <x-button class="mt-4 w-full flex justify-center py-3">
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
                $('.modal-container').fadeToggle(600);

                if (!$(this).data('open')) {
                    $('body').addClass('overflow-hidden');
                    $('.modal').animate({
                        marginTop: 0
                    });
                    $(this).data('open', true)
                } else {
                    $('body').removeClass('overflow-hidden');
                    $('.modal').animate({
                        marginTop: '-2.5rem'
                    });
                    $(this).data('open', false)
                }
            });
        })

        $('.modal-container').on('click', () => {
            // if is modal (nested click problems)
            if ($(event.target).hasClass('modal-container')) {
                $('.toggle-modal').click();
            }
        })

        $('.close-modal').on('click', function () {
            $('.toggle-modal').click();
        })
    </script>
@endsection
