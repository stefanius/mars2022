<?php

namespace App\Http\Controllers\Backoffice\TicketBooth;

use App\Models\Order;
use Illuminate\Routing\Controller;

class TicketBoothController extends Controller
{
    /**
     * Show the addresses index.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return redirect(route('ticket-booth.order-searcher'));
    }

    /**
     * Show the addresses index.
     *
     * @return \Illuminate\View\View
     */
    public function orderSearcher()
    {
        return view('backoffice.pages.ticket-booth.order-searcher');
    }

    /**
     * Show the addresses index.
     *
     * @return \Illuminate\View\View
     */
    public function sales()
    {
        return view('backoffice.pages.ticket-booth.sales');
    }

    /**
     * Show a order page.
     *
     * @return \Illuminate\View\View
     */
    public function preorder()
    {
        return view('backoffice.pages.ticket-booth.preorder');
    }

    /**
     * Show a order page.
     *
     * @return \Illuminate\View\View
     */
    public function medals()
    {
        return view('backoffice.pages.ticket-booth.medals');
    }
}
