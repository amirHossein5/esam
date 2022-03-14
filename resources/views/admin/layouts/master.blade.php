<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head-tag')
    @yield('head-tag')
    @stack('head-tag')
</head>

<body dir="rtl">

    @include('admin.layouts.header')

    <section class="body-container">

        @include('admin.layouts.sidebar')

        <section id="main-body" class="main-body">

            @yield('content')

        </section>
    </section>

    @include('admin.layouts.script')
    @yield('script')
    @stack('script')

    <section
        class="flex-column-reverse toast-wrapper position-fixed d-flex"
        style="top: 8%; left: 1%; z-index: 1001;"
    >
        @include('alerts.toast.all')
    </section>

    @include('alerts.sweetalert.all')

</body>

</html>
