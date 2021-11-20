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
    <table>
        <thead>
        <tr>
            <th class="quantity"> {{ __('Quantity') }} </th>
            <th class="description"> {{ __('Type') }} </th>
        </tr>
        </thead>
        <tbody>
            @foreach($order->orderLines as $orderLine)
                <tr>
                    <td class="quantity"> {{ $orderLine->quantity }} </td>
                    <td class="description"> {{ $orderLine->ticket->name }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
