<?php

namespace App\Http\Controllers\Backoffice\Orders;

use App\Models\Day;
use App\Models\Order;
use App\Models\Distance;
use App\Models\TicketType;
use App\Actions\CreateOrder;
use Illuminate\Routing\Controller;
use App\Http\Requests\OrderStoreRequest;

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

    /**
     * Show a season page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.orders.create', [
            'distances' => Distance::all(),
            'ticketTypes' => TicketType::all(),
            'days' => Day::where('show_on_pre_order', '=', true)->get(),
        ]);
    }

    /**
     * @param OrderStoreRequest $request
     */
    public function store(OrderStoreRequest $request)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        $order = app(CreateOrder::class)->handle($request->validated(), $request->ticketTypes(), $request->ticketCount(), $request->halfPrice());

        return redirect(route('orders.index'));
    }
}
