<?php

namespace App\Http\Controllers\Backoffice\Seasons;

use App\Models\Season;
use Illuminate\Routing\Controller;

class SeasonsController extends Controller
{
    /**
     * Show the addresses index.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.seasons.index');
    }

    /**
     * Show a season page.
     *
     * @param Season $season
     *
     * @return \Illuminate\View\View
     */
    public function show(Season $season)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.orders.show', ['season' => $season]);
    }

    /**
     * Show a season page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.orders.create');
    }
}
