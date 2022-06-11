<header>
    <section>
        <section class="relative flex items-center justify-center">
            <div>
                <a href="{{ route('customer.product.search', [
                        'sell-type' => 'auction',
                        'sort' => 'last-remaining-auctions',
                        'active-auctions' => 'on'
                    ]) }}">
                    <img src="{{ asset('app-assets/images/last-auctions.webp') }}" alt="last-auctions">
                </a>
            </div>

            <div class="absolute hidden md:block left-1 top-3 ">
                <a href="{{ route('customer.faq.index') }}" class="px-4 py-2 text-gray-600 bg-blue-300 rounded-md">سوالات متداول</a>
                <a href="{{ route('customer.dashboard.products.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md">فروش کالا</a>
            </div>
        </section>
    </section>

    <section class="flex items-center justify-between h-10 px-2 py-8 mt-3 border-gray-200 shadow-md border-y lg:py-9">

        <div class="flex items-center h-[inherit] gap-2 md:gap-6">
            <div class="p-2 rounded-md cursor-pointer bg-slate-gray lg:p-3 open-menu">
                <i class="text-3xl opacity-75 icofont-navigation-menu"></i>
            </div>

            <a href="{{ route('customer.index') }}" class="cursor-pointer h-[inherit]">
                <img src="{{ asset($setting->logo) }}" class="max-h-full" alt="logo">
            </a>
        </div>

        <div class="hidden md:block">
            <form action="{{ route('customer.product.search') }}" class="flex">
                {{-- parameters not be remvoe --}}
                @foreach (request()->except('kw') as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <input type="text" placeholder="جستجو میان کالاها..."
                    class="border border-gray-600 h-12 w-80 lg:w-[39rem] rounded-r-md text-gray-600" name="kw" value="{{ request()->get('kw') }}">
                <button class="flex items-center justify-center h-12 px-4 border border-gray-600 rounded-l-md">
                    <i class="text-xl icofont-search"></i>
                </button>
            </form>
        </div>

        <section class="flex gap-2">

            <div class="relative gap-3 p-2 rounded-md cursor-pointer bg-slate-gray md:p-3 dropdown">
                <i class="icofont-ui-user"></i>
                <i class="icofont-simple-down"></i>

                <section class="left-0 w-56 my-2 bg-white border rounded-md shadow-md top-full dropdown-zone"
                    data-open="false">
                    <div class="py-1 border-b">
                        @guest
                            <a
                                href="{{ route('customer.auth.loginRegisterForm') }}"
                                class="block px-3 py-2 text-base transition hover:bg-gray-100"
                            >
                                ورود / ثبت نام
                            </a>
                        @endguest
                        @auth
                            <a href="{{ route('customer.dashboard.index') }}" class="block px-3 py-2 text-base transition hover:bg-gray-100">داشبورد</a>
                            <a href="{{ route('customer.auth.logout') }}" class="block px-3 py-2 text-base transition hover:bg-gray-100">خروج</a>
                        @endauth
                    </div>
                </section>
            </div>

            <a href="{{ route('customer.cart.index') }}" class="flex flex-row-reverse justify-center p-2 rounded-md cursor-pointer relative bg-slate-gray md:p-3">
                <i class="icofont-cart-alt text-2xl"></i>

                @if ( auth()->user()?->cartItems()->count() > 0)
                    <span class="bg-red-600 text-gray-200 font-bold relative flex items-center top-1 px-2 rounded-full">{{ auth()->user()->cartItems()->count() }}</span>
                @endif
            </a>
        </section>

    </section>

    <section class="menu fixed w-64 sm:w-72 md:w-96 border-l top-0 h-screen bg-white hidden -mr-[100%] z-[100]">
        <div
            class="absolute rounded-md bg-orange-700 right-[90%] sm:top-[1rem] close-menu w-10 h-10 flex justify-center cursor-pointer items-center">
            <i class="text-xl text-white icofont-close"></i>
        </div>
        <div class="h-4 bg-green-900"></div>
        <div class="navs">
            <div class="hidden py-4 pr-4 cursor-pointer bg-slate-200 menu-back-guider">
                <i class="icofont-simple-right"></i>
                <span class="text">گروه های اصلی</span>
            </div>
            <div class="py-4 pr-4 cursor-pointer bg-slate-100 menu-current-guider">
                <i class="icofont-simple-down"></i>
                <span class="text">گروه های اصلی</span>
            </div>
        </div>
        <section class="menus overflow-y-scroll h-[calc(100%-5rem)] cursor-pointer relative">
            @foreach ($productCategories as $productCategory)
                @if ($productCategory->children->isNotEmpty())
                    <div class="flex justify-between px-2 py-4 text-gray-600 bg-hover show-children" data-open="false"
                        id="{{ $productCategory->id }}">
                        <span>{{ $productCategory->name }}</span>
                        <i class="icofont-simple-down"></i>

                        <div class="hidden children">
                            @include('customer.layouts.children-menu', [
                                'children' => $productCategory->children
                            ])
                        </div>
                    </div>
                @else
                    <div class="flex justify-between px-2 py-4 text-gray-600 bg-hover">
                        <a href="{{ route('customer.product.search', ['category' => $productCategory->id]) }}">{{ $productCategory->name }}</a>
                    </div>
                @endif
            @endforeach
        </section>
    </section>
</header>
