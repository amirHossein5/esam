<!DOCTYPE html>
<html lang="en">

<head>
    @include('app.layouts.head-tag')
    @yield('head-tag')
    @stack('head-tag')
</head>

<style>
    .products-owl-carousel .owl-item {
        min-height: 27rem;
    }
</style>

<body dir="rtl" class="relative">
    @include('app.layouts.header')

    <main class="pt-5 pb-10 text-gray-900 bg-gray-100">
        <section class="px-4 mx-auto lg:container lg:px-4 sm:px-9">
            @include('app.layouts.discount')
            @yield('content')
        </section>
    </main>

    @include('app.layouts.footer')

    <section class="menu-overlay absolute top-0 right-0 left-0 bottom-0 bg-gray-400 opacity-50 hidden z-[99]">
    </section>

    @include('app.layouts.script')

    @yield('scripts')
    @stack('scripts')
</body>

</html>
