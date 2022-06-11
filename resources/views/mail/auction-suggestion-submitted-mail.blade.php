@component('mail::message')

در مزایده {{ $product->name }} پیشنهاد جدیدی به قیمت:   {{ $suggested_amount }} تومان ثبت شد.

@component('mail::button', ['url' => route('customer.product.item', [$product->id, $product->slug])])
صفحه مزایده
@endcomponent


{{ config('app.name') }}
@endcomponent
