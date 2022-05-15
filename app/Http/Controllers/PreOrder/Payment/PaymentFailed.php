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

        return view('register.pages.payment-failed', ['order' => $order]);
    }
}
