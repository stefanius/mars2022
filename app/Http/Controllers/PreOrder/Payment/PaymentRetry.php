<?php

namespace App\Http\Controllers\PreOrder\Payment;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Actions\CreateMolliePayment;
use App\Http\Controllers\Controller;

class PaymentRetry extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
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

        return app(CreateMolliePayment::class)->handle($order);
    }
}
