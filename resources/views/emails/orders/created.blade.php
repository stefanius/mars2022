@component('mail::message')
# {{ __('Thank you!') }}

{{ __('Thank you for your order. When your payment is verified you will recieve your tickets.') }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
