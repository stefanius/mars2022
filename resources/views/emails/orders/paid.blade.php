@component('mail::message')
# {{ __('Order details Duinenmars') }}

## {{ __('Order') }}: {{ $order->order_number }}

{{ __('Thank you for your order. Bring this email with you when you are going to the Duinenmars.') }}

{!! DNS1D::getBarcodeSVG($order->order_number, 'EAN13') !!}

@component('mail::table')
| {{ __('Medal') }} | {{ __('Quantity') }} |
|:--------------------:|:--------------------: |
@foreach($order->orderLines as $orderLine)
| {{ $orderLine->ticket->name }} | {{ $orderLine->quantity }} |
@endforeach
@endcomponent

### {{ __('Total number of attendee\'s') }}: {{ $order->numberOfAttendees() }}
### {{ __('Total number of medals') }}: {{ $order->numberOfMedals() }}

### {{ __('Total payment: ') }} {{ $order->grandTotalCurrency }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
