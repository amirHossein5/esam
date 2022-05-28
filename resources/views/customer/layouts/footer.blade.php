    <footer class="border-t pt-9">
        <section class="lg:container  mx-auto lg:px-4 px-4 sm:px-9">
            <section class="row pb-4">
                <section class="w-full md:w-3/12 flex flex-wrap p-2 gap-16 md:justify-start justify-center">
                    <section class="flex gap-7 flex-wrap justify-center">
                        <section>
                            <p class="text-gray-600 text-base text-center">سوالات متداول</p>
                            <div class="flex flex-col gap-y-5 mt-3">
                                @foreach ($randomFaqs as $faq)
                                    <a href="{{ route('customer.faq.show', $faq->slug) }}" class="a-hover">
                                        {{ $faq->question }}
                                    </a>
                                @endforeach
                            </div>
                        </section>
                    </section>
                </section>
                <section class="w-full md:w-6/12 p-2">
                    <p class="text-gray-600 text-base">
                        {{ $setting->available_hours }} پاسخگوی شما هستیم.
                    </p>
                    <p class="text-gray-600 text-base mt-2">
                        شماره تماس: {{ $setting->phone_number }}
                    </p>
                    <section class="mt-5">
                        <div class="flex justify-center">
                            <img src="{{ asset('app-assets/images/mdLogo.webp') }}" class="w-20 my-3" alt="">
                        </div>
                        <p class="text-gray-600">
                            استفاده از سایت مشروط بر قبول توافقنامه کاربری و حفظ حریم شخصی است.
                        </p>
                        <p class="text-gray-600 ">
                            تمام حقوق مادی و معنوی این مجموعه متعلق به شرکت توسعه فناوری اطلاعات سیستم های تجارت ویراسام
                            با
                            مسئولیت محدود تحت شماره 339393 است.
                        </p>
                    </section>
                </section>
            </section>
        </section>
    </footer>
