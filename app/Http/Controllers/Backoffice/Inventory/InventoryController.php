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
        return view('backoffice.pages.inventory.show', $order);
    }
}
