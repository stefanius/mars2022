<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPaid extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var Order
     */
    protected $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->locale($order->preferredLocale());

        $this->subject("[DUINENMARS] " . __("Order paid") . " ({$order->order_number})");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.paid', [
            'order' => $this->order,
        ]);
    }
}
