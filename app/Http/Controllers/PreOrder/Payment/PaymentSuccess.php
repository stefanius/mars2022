<?php

namespace App\Http\Controllers\PreOrder\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentSuccess extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        return view('register.pages.thank-you');
    }
}
