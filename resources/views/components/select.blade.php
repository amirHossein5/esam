@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 px-2 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm']) !!}>
    {{ $slot }}
</select>
