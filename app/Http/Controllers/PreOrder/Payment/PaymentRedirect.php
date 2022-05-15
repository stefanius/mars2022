<?php

namespace App\Http\Controllers\PreOrder\Payment;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentRedirect extends Controller
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
            return response("<h1>Invalid Order</h1>" . json_encode($request->all()), 401);
        }

        if ($order->isPaid()) {
            return redirect(route('payment.success', ['locale' => $request->get('locale')]));
        }

        return redirect(route('payment.failed', ['hash' => $request->get('hash'), 'id' => $request->get('order'), 'locale' => $request->get('locale')]));
    }
}
