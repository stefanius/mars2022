<?php

namespace App\Http\Controllers\Backoffice\Statistics;

use App\Models\Order;
use Illuminate\Routing\Controller;

class OrderStatisticsController extends Controller
{
    /**
     * Show a order page.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        return view('backoffice.pages.statistics.orders');
    }
}
