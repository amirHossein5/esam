<section class="md:w-3/12">
    <section class="sticky top-2 flex flex-col gap-3">

        <section class="bg-white rounded-md border shadow-lg p-2">
            <a href="{{ route('customer.dashboard.myOrders') }}"
                class="block p-7 text-gray-600 transition hover:bg-gray-200 border-b last:border-b-0">
                سفارش های من
            </a>

            <a href="{{ route('customer.dashboard.myAddresses') }}"
                class="block p-7 text-gray-600 transition hover:bg-gray-200 border-b last:border-b-0">
                آدرس های من
            </a>

            <a href="{{ route('customer.dashboard.favorites') }}"
                class="block p-7 text-gray-600 transition hover:bg-gray-200 border-b last:border-b-0">
                لیست علاقه مندی
            </a>

            <a href="{{ route('customer.dashboard.account') }}"
                class="block p-7 text-gray-600 transition hover:bg-gray-200 border-b last:border-b-0">
                ویرایش حساب
            </a>

            <a href="{{ route('customer.auth.logout') }}"
                class="block p-7 text-gray-600 transition hover:bg-gray-200 border-b last:border-b-0">
                خروج از حساب
            </a>
        </section>

        <section class="bg-white rounded-md border shadow-lg p-2">
            <p class="p-7 text-gray-600 transition hover:bg-gray-200 border-b last:border-b-0">
                موجودی: <span class="text-lg">۱۰۰٫۰۰۰</span> تومان
            </p>

            <div class="p-5 text-gray-600  border-b last:border-b-0">
                <form action="">
                    <x-input class="w-full border h-[35px] text-base p-2 placeholder:text-sm" placeholder="موجودی..."/>

                    <x-button class="flex justify-center tracking-normal bg-gray-800 mt-2 w-full"> افزایش موجودی</x-button>
                </form>
            </div>

        </section>

    </section>

</section>
