<?php

namespace App\Actions;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\TicketType;
use Illuminate\Support\Arr;

class CreateOrder
{
    /**
     * Create an order.
     *
     * @param array $orderData
     * @param array $ticketTypes
     * @param array $ticketCount
     * @param array $halfPrice
     *
     * @return Order
     */
    public function handle(array $orderData, array $ticketTypes, array $ticketCount, array $halfPrice): Order
    {
        $order = \App\Models\Order::create($orderData);

        $this->orderLines($ticketTypes, $ticketCount, $halfPrice)->each(function ($ticket) use ($order) {
            OrderLine::create([
                'order_id' => $order->id,
                'ticket_type_id' => $ticket['ticket']->id,
                'half_price' => Arr::get($ticket, 'half_price', false),
                'quantity' => $ticket['quantity'],
                'amount' => $ticket['ticket']->amount_order,
                'total_amount' => $ticket['total'],
            ]);
        });

        return $order;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function orderLines(array $ticketTypes, array $ticketCount, array $halfPrice)
    {
        $tickets = collect();

        foreach ($ticketTypes as $key => $value) {
            if (empty($value) || $value == 0) {
                continue;
            }

            $ticketType = TicketType::find($value);
            $quantity = $ticketCount[$key];
            $ticketHalfPrice = Arr::get($halfPrice, $key, false);

            $total = $quantity * $ticketType->amount_order;
            $amount = $ticketType->amount_order;

            if ($ticketHalfPrice) {
                $total = $total / 2;
                $amount = $amount / 2;
            }

            $tickets->put($key, [
                'ticket' => $ticketType,
                'quantity' => $quantity,
                'total' => $total,
                'amount' => $amount,
                'half_price' => $ticketHalfPrice,
                'total_decimal' => (double) $total / 100,
            ]);
        }

        return $tickets;
    }
}
