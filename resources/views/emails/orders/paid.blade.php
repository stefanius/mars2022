@component('mail::message')
# {{ __('Stichting Duinenmars') }}

## {{ __('Order') }}: {{ $order->order_number }}
<img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($order->order_number, 'EAN13') }}"/>

{{ __('Thank you for your order. Bring this email with you when you are going to the Duinenmars.') }}

## {{ __('Details') }}
@if($order->eventDate())
{{ __('Date') }}: {{ $order->eventDate()->isoFormat('MMMM Do YYYY') }} ({{ $order->eventDate()->isoFormat('dddd') }})
@endif()


@if($order->distance->isWeekend())
{{ __('Because this distance is splitted over both saturday and sunday, you have to walk on both days halve the distance.') }}
@endif()

{{ __('You should start between:') }} {{ $order->distance->checkInTimeWindow() }}

@component('mail::table')
| {{ __('Medal') }} | {{ __('Quantity') }} |
|:--------------------:|:--------------------: |
@foreach($order->orderLines as $orderLine)
| {{ $orderLine->ticket->name }} | {{ $orderLine->quantity }} |
@endforeach
@endcomponent

### {{ __('Total number of attendees') }}: {{ $order->numberOfAttendees() }}
### {{ __('Total number of medals') }}: {{ $order->numberOfMedals() }}

### {{ __('Total payment') }}: {{ $order->grandTotalCurrency }}

<br />
@endcomponent
