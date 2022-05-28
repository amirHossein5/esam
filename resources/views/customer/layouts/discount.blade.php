    {{-- discount --}}
    @if ($landingPageCopan)
        <section class="mt-2 mb-5 sm:flex">
            <section class="sm:w-2/3 max-h-[55px]">
                <img class="lazy" src="{{ asset('app-assets/images/discount-loader.webp') }}"
                    data-src="{{ asset($landingPageCopan->image) }}" alt="" class="sm:h-full min-h-[30px]">
            </section>
            <section class="sm:w-1/3 flex p-3 max-h-[55px] items-center bg-blue-300">
                <section
                    class="flex flex-col items-center w-1/2 px-3 py-1 border border-gray-700 border-dashed rounded-md">
                    <p class="text-gray-700">کد تخفیف:</p>
                    <input type="text" class="h-5 text-center bg-transparent border-none w-36 sm:h-8 select-inside-text"
                        value="{{ $landingPageCopan->copan->code }}">
                </section>
                <section class="flex items-center justify-center w-1/2">
                    <span
                        class="text-2xl text-gray-700 show-remaining-time"
                        data-remain-time="{{ $landingPageCopan->copan->end_date->timestamp - now()->timestamp }}"
                    >
                    </span>
                </section>
            </section>
        </section>

        @push('scripts')
            <script>
                window.onload = function() {
                    var durationPerSecond = {{ $landingPageCopan?->copan->end_date->timestamp - now()->timestamp }},
                        display = document.querySelector('#landingPageCopan-copan-remaining-time');
                    var endText = $(display).text();
                    var url = display.href;

                    if (durationPerSecond > 0) {
                        startTimer(durationPerSecond, display, endText, url);
                    }
                };
            </script>
        @endpush
    @endif
