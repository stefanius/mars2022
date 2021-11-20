<?php

namespace App\Http\Controllers\Backoffice\Orders;

use App\Models\Order;
use Illuminate\Routing\Controller;

class OrderPrintController extends Controller
{
    /**
     * Show a order page.
     *
     * @param Order $order
     *
     * @return \Illuminate\View\View
     */
    public function index(Order $order)
    {
        $order->markAsPrinted();

        return view('backoffice.pages.orders.print', ['order' => $order]);
    }
}
