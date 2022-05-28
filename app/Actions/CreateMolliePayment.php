<?php

namespace App\Actions;

use Mollie;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;

class CreateMolliePayment
{
    /**
     * Prepate a mollie payment.
     *
     * @param Order $order
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Order $order): RedirectResponse
    {
        return $this->preparePayment($order);
    }

    /**
     * Prepare Mollie payment.
     *
     * @param Order $order
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function preparePayment(Order $order): RedirectResponse
    {
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => number_format($order->grandTotal, 2, '.', ''), // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Duinenmars Order #" . $order->order_number,
            "redirectUrl" => route('payment.redirect', ['hash' => $order->hash, 'order' => $order->id, 'locale' => $order->locale]),
            "webhookUrl" => route('webhooks.mollie'),
            "metadata" => [
                "order_id" => $order->order_number,
            ],
        ]);

        // redirect customer to Mollie checkout page
        return redirect()->away($payment->getCheckoutUrl(), 303);
    }
}
