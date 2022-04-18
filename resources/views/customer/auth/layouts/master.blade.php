<!doctype html>
<html lang="fa" dir="rtl">
<head>
    @include('customer.auth.layouts.head-tag')
    @yield('head-tag')
    @stack('head-tag')
</head>
<body>

    <main id="main-body-one-col" class="main-body">

        @yield('content')

    </main>

    @include('customer.auth.layouts.scripts')
    @yield('scripts')
    @stack('scripts')
</body>
</html>
