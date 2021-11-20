<?php

namespace App\Http\Controllers\Backoffice\Home;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backoffice.pages.home.index');
    }
}
