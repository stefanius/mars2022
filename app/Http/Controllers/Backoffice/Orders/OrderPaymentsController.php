<?php

namespace App\Http\Controllers\Backoffice\Orders;

use App\Models\Order;
use Illuminate\Routing\Controller;

class OrderPaymentsController extends Controller
{
    /**
     * Show the order payments index.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backoffice.pages.orders.payments.index');
    }

    /**
     * Show a order page.
     *
     * @param Order $order
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        return view('backoffice.pages.orders.payments.show', $order);
    }
}
