    {{-- <script src="{{ asset('app-assets/js/lazy-loader.js') }}"></script> --}}
    <script src="{{ asset('app-assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/main.js') }}"></script>

    <script type="text/javascript" src="{{ asset('app-assets/js/jquery.lazy.min.js') }}"></script>

    <script>
        $(function() {
            $('.lazy').lazy({
                effect: "fadeIn"
            });
        });
    </script>