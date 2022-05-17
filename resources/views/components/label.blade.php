@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 m-1']) }}>
    {{ $value ?? $slot }}
</label>
