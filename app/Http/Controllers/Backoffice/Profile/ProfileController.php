<?php

namespace App\Http\Controllers\Backoffice\Profile;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    /**
     * Show the user profile screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('backoffice.pages.profile.index', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
