<section class="md:w-3/12">
    <section class="sticky flex flex-col gap-3 top-2">

        <section class="p-2 bg-white border rounded-md shadow-lg">
            <a href="{{ route('customer.dashboard.products.index') }}"
                class="block text-gray-600 transition border-b p-7 hover:bg-gray-200 last:border-b-0">
                کالاها
            </a>

            <a href="{{ route('customer.dashboard.myOrders') }}"
                class="block text-gray-600 transition border-b p-7 hover:bg-gray-200 last:border-b-0">
                سفارش های من
            </a>

            <a href="{{ route('customer.dashboard.myAddresses.index') }}"
                class="block text-gray-600 transition border-b p-7 hover:bg-gray-200 last:border-b-0">
                آدرس های من
            </a>

            <a href="{{ route('customer.dashboard.favorites') }}"
                class="block text-gray-600 transition border-b p-7 hover:bg-gray-200 last:border-b-0">
                لیست علاقه مندی
            </a>

            <a href="{{ route('customer.dashboard.account') }}"
                class="block text-gray-600 transition border-b p-7 hover:bg-gray-200 last:border-b-0">
                ویرایش حساب
            </a>

            <a href="{{ route('customer.auth.logout') }}"
                class="block text-gray-600 transition border-b p-7 hover:bg-gray-200 last:border-b-0">
                خروج از حساب
            </a>
        </section>

        <section class="p-2 bg-white border rounded-md shadow-lg">
            <p class="text-gray-600 transition border-b p-7 hover:bg-gray-200 last:border-b-0">
                موجودی: <span class="text-lg">{{ auth()->user()->cash_readable }}</span> تومان
            </p>

            <div class="p-5 text-gray-600 border-b last:border-b-0">
                <form action="{{ route('customer.dashboard.enhanceCash') }}" method="post">
                    @csrf @method('put')
                    <x-input type="text" name="cash" class="w-full border h-[35px] text-base p-2 placeholder:text-sm" placeholder="موجودی..."/>

                    <x-button class="flex justify-center w-full mt-2 tracking-normal bg-gray-800"> افزایش موجودی</x-button>

                    @error('cash')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </form>
            </div>

        </section>

    </section>

</section>
