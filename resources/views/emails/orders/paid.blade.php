@component('mail::message')
# {{ __('Payment confirmation') }}

## {{ __('Order') }}: {{ $order->order_number }}

{{ __('The payment of your order was successful. Bring this email with you when you are visiting our event.') }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
