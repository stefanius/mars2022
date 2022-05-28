<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/print.css">
        <title>{{ $order->order_number }}</title>
    </head>

    <body id="body" onload="window.print()">
        <div class="ticket">
            <h1 class="centered">{{ $order->order_number }}</h1>
            <span>{{ __('Distance') }}: {{ $order->distance->name }} KM</span> </br>
            <span>{{ __('Started At') }}: {{ $order->started_at->format("H:i") }}</span>
            <table>
                <thead>
                <tr>
                    <th class="quantity"> {{ __('Quantity') }} </th>
                    <th class="description"> {{ __('Medall') }} </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($order->orderLines as $orderLine)
                        <tr>
                            <td class="quantity"> {{ $orderLine->quantity }} </td>
                            <td class="description"> {{ $orderLine->ticket->name }} </td>
                        </tr>
                    @endforeach

                    @if($order->isGroup())
                        <tr>
                            <td class="quantity"> 1 </td>
                            <td class="description"> {{ __('Group price') }} </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- Extra whitelines to create some spacing for the printer -->
        <br />
        <br />
        <br />
        <span class="is-text-muted">{{ __('Printed At') }}: {{ now()}}</span><br />
    </body>
</html>
