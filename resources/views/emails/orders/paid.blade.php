@component('mail::message')
# {{ __('Order details Duinenmars') }}

## {{ __('Order') }}: {{ $order->order_number }}

{{ __('Thank you for your order. Bring this email with you when you are going to the Duinenmars.') }}

{!! DNS1D::getBarcodeHTML($order->order_number, 'EAN13') !!}

@component('mail::table')
| {{ __('Medal') }} | {{ __('Quantity') }} |
|:--------------------:|:--------------------: |
@foreach($order->orderLines as $orderLine)
| {{ $orderLine->ticket->name }} | {{ $orderLine->quantity }} |
@endforeach
@endcomponent

### {{ __('Total number of attendee\'s') }}: {{ $order->numberOfAttendees() }}
### {{ __('Total number of medals') }}: {{ $order->numberOfMedals() }}

@if ($order->isGroup())
### {{ __('Do not forget your special reward! Since you subscribed with at least :attendees you will receive the group price after you finish.', ['attendees', $order->season->minimum_group]) }}
@endif

### {{ __('Total payment: ') }}  € {{ $order->grandTotalCurrency }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
