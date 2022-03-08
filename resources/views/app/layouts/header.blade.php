<header>
    <section>
        <section class="flex justify-center items-center relative">
            <div>
                <a href="">
                    <img src="{{ asset('app-assets/images/last-auctions.webp') }}" alt="last-auctions">
                </a>
            </div>

            <div class="absolute md:block hidden left-1 top-3 ">
                <a class="bg-blue-300 px-4 py-2 text-gray-600 rounded-md">فروش کالا</a>
            </div>
        </section>
    </section>

    <section class="flex justify-between mt-3 shadow-md border-y py-8 px-2 lg:py-9 border-gray-200 items-center h-10">

        <div class="flex items-center h-[inherit] gap-2 md:gap-6">
            <div class="bg-slate-gray p-2 lg:p-3 rounded-md open-menu cursor-pointer">
                <i class="icofont-navigation-menu text-3xl opacity-75"></i>
            </div>

            <a href="" class="cursor-pointer h-[inherit]">
                <img src="{{ asset('app-assets/images/mdLogo.webp') }}" class="max-h-full" alt="logo">
            </a>
        </div>

        <div class="md:block hidden">
            <form action="" class="flex">
                <input type="text" placeholder="جستجو درمیان ۶۰۰ هزار کالا..."
                    class="border border-gray-600 h-12 w-80 lg:w-[39rem] rounded-r-md text-gray-600">
                <button class="border px-4 h-12 flex justify-center items-center border-gray-600 rounded-l-md">
                    <i class="icofont-search text-xl"></i>
                </button>
            </form>
        </div>

        <div class="gap-3 bg-slate-gray p-2 md:p-3 rounded-md relative dropdown cursor-pointer">
            <i class="icofont-ui-user"></i>
            <i class="icofont-simple-down"></i>

            <section class="top-full my-2 w-56 shadow-md left-0 rounded-md border bg-white dropdown-zone"
                data-open="false">
                <div class="border-b">
                    <a href="" class="text-lg px-3 py-2 block">ورود</a>
                    <a href="" class="text-lg px-3 py-2 block">ثبت نام</a>
                </div>
                <div class="border-b">
                    <a href="" class="text-lg px-3 py-2 block">ورود</a>
                    <a href="" class="text-lg px-3 py-2 block">ثبت نام</a>
                </div>
            </section>
        </div>
    </section>

    <section class="menu fixed w-64 sm:w-72 md:w-96 border-l top-0 h-screen bg-white hidden -mr-[100%] z-[100]">
        <div
            class="absolute rounded-md bg-orange-700 right-[90%] sm:top-[1rem] close-menu w-10 h-10 flex justify-center cursor-pointer items-center">
            <i class="icofont-close text-white text-xl"></i>
        </div>
        <div class="h-4 bg-green-900"></div>
        <div class="navs">
            <div class="py-4 pr-4 bg-slate-200 menu-back-guider cursor-pointer hidden">
                <i class="icofont-simple-right"></i>
                <span class="text">گروه های اصلی</span>
            </div>
            <div class="py-4 pr-4 bg-slate-100 menu-current-guider cursor-pointer">
                <i class="icofont-simple-down"></i>
                <span class="text">گروه های اصلی</span>
            </div>
        </div>
        <section class="menus overflow-y-scroll h-[calc(100%-5rem)] cursor-pointer relative">
            <div class="py-4 px-2 text-gray-600 flex justify-between bg-hover show-children" data-open="false"
                id="menu-1">
                <span>موبایل و تبلت</span>
                <i class="icofont-simple-down"></i>

                <div class="children hidden">
                    <section
                        class="absolute top-0 bg-white right-0 left-0 menus  overflow-y-scroll h-full cursor-pointer">
                        <div class="py-4 px-2 text-gray-600 flex justify-between bg-hover show-children"
                            data-open="false" id="menu-2">
                            <span>موبایل و 1</span>
                            <i class="icofont-simple-down"></i>

                            <div class="children hidden">
                                <section
                                    class="absolute top-0 bg-white right-0 left-0 menus  overflow-y-scroll h-full cursor-pointer">
                                    <div class="py-4 px-2 text-gray-600 flex justify-between bg-hover show-children"
                                        data-open="false" id="menu-3">
                                        <span>موبایل و 10000</span>
                                        <i class="icofont-simple-down"></i>
                                        <div class="children hidden">
                                            <section
                                                class="absolute top-0 bg-white right-0 left-0 menus  overflow-y-scroll h-full cursor-pointer">
                                                <div class="py-4 px-2 text-gray-600 flex justify-between bg-hover">
                                                    <a href="#">موبایل و 30000000</a>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="py-4 px-2 text-gray-600 flex justify-between bg-hover">
                            <a href="#">موبایل و 3</a>
                        </div>
                    </section>
                </div>
            </div>
            <div class="py-4 px-2 text-gray-600 flex justify-between bg-hover">
                <a href="#">موبایل و تبلت</a>
            </div>
        </section>
    </section>
</header>
