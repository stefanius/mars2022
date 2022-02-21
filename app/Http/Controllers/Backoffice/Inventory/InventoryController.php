<?php

namespace App\Http\Controllers\Backoffice\Inventory;

use App\Models\Order;
use Illuminate\Routing\Controller;

class InventoryController extends Controller
{
    /**
     * Show the addresses index.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.inventory.index');
    }

    /**
     * Show a order page.
     *
     * @param Order $order
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.inventory.show', $order);
    }
}
