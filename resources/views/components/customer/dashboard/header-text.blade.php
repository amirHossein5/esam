<div class="p-1 border-b flex justify-between items-center">
    <h6 {!! $attributes->merge(['class' => 'text-[1.06rem] border-b-2 border-red-500 relative -bottom-1 p-2']) !!}
        style="text-shadow: 2px 2px 8px rgba(0,0,0,0.3)">
        {{ $slot }}
    </h6>

    {{ $other ?? '' }}
</div>
