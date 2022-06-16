<?php

namespace App\Http\Controllers\Backoffice\Orders;

use App\Models\Order;
use Illuminate\Routing\Controller;

class OrdersController extends Controller
{
    /**
     * Show the addresses index.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.orders.index');
    }

    /**
     * Show a order page.
     *
     * @param Order $order
     *
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        return view('backoffice.pages.orders.show', ['order' => $order]);
    }
}
