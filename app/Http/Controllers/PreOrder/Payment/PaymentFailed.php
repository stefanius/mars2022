<?php

namespace App\Http\Controllers\PreOrder\Payment;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentFailed extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $order = Order::where('hash', '=', $request->get('hash'))
                    ->where('id', '=', $request->get('order'))
                    ->where('locale', '=', $request->get('locale'))
                    ->first();

        if (!$order) {
            return response('Invalid Order', 401);
        }

        return response("<h1>LOSER!</h1><h2>Betaling is gefaald!</h2>" . $order->mollie_payment_status, 200);
    }
}
