<?php

namespace App\Listeners;

use App\Models\Order;
use App\Mail\OrderPaid;
use App\Events\OrderPaid as Event;
use Illuminate\Support\Facades\Mail;

class MailOrderPaidConfirmation
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
        Mail::to($order)->send(new OrderPaid($order));
    }
}
