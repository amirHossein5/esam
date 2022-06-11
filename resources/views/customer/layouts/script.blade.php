    {{-- <script src="{{ asset('app-assets/js/lazy-loader.js') }}"></script> --}}
    <script src="{{ asset('app-assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/main.js') }}"></script>
    <script src="{{ asset('admin-assets/sweetlaert/sweetalert2.all.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('app-assets/js/jquery.lazy.min.js') }}"></script>

    <script>
        $(function() {
            $('.lazy').lazy({
                effect: "fadeIn"
            });

            /** count down */
            setInterval(function() {
                $('.show-remaining-time').each((key, item) => {
                    var countDownDate = new Date($(item).data('remain-time')).getTime();

                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Display the result in the element

                    innerHTML = '';

                    if (days > 0) {
                        innerHTML += days + ":";
                    }
                    if (hours <= 0) {
                        hours = '00'
                    }
                    if (minutes <= 0) {
                        minutes = '00'
                    }

                    item.innerHTML = innerHTML + hours + ':' + minutes + ':' + seconds

                    // If the count down is finished, write some text
                    if (distance < 0) {
                        item.innerHTML = "00:00:00";
                        $(item).addClass('text-red-600');
                    }
                });
            }, 1000);

        });
    </script>
