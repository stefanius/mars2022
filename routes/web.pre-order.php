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

    Route::get('/order/success', function () {
        return view('register.pages.thank-you');
    })->name('order.success');
});

Route::post('/hooks/mollie', function () {
    $paymentId = request()->input('id');
    $payment = \Mollie\Laravel\Facades\Mollie::api()->payments->get($paymentId);

    if ($payment->isPaid()) {
        echo 'Payment received.';

        \App\Models\Order::where('order_number', $payment->metadata->order_id)->first()->markAsPaid($payment);
    } else {
        echo 'Payment failed.';

        \App\Models\Order::where('order_number', $payment->metadata->order_id)->first()->paymentFailed($payment);
    }
})->name('webhooks.mollie');
