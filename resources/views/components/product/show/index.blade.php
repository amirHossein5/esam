@props(['type', 'products'])


@if ($type === 'carousel')
    <x-product.show.carousel :products="$products" />
@elseif ($type === 'max-grid-5')
    <x-product.show.max-grid-5 :products="$products" :attributes="$attributes"/>
@elseif ($type === 'max-grid-4')
    <x-product.show.max-grid-4 :products="$products" :attributes="$attributes"/>
@endif
