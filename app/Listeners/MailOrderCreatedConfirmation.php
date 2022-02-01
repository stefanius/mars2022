<?php

namespace App\Listeners;

use App\Models\Order;
use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;
use App\Events\OrderCreated as Event;

class MailOrderCreatedConfirmation
{
    /**
     * @param Event $event
     */
    public function handle(Event $event)
    {
        $order = $event->order;

        if ($order->hasEmail()) {
            $this->sendOrderConfirmation($order);
        }
    }

    /**
     * @param Order $order
     */
    protected function sendOrderConfirmation(Order $order)
    {
        Mail::to($order)->send(new OrderCreated($order));
    }
}
