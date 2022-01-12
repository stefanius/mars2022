<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['locale']], function () {
    Route::get('/', function () {
        return view('register.pages.index');
    });

    Route::get('/hooks/mollie', function () {
        $paymentId = request()->input('id');
        $payment = \Mollie\Laravel\Facades\Mollie::api()->payments->get($paymentId);

        if ($payment->isPaid()) {
            echo 'Payment received.';
            // Do your thing ...
        }
    })->name('webhooks.mollie');

    Route::get('/order/success', function () {
        return view('register.pages.thank-you');
    })->name('order.success');
});
