<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreOrder\Payment\PaymentFailed;
use App\Http\Controllers\PreOrder\Payment\PaymentSuccess;
use App\Http\Controllers\PreOrder\Payment\PaymentRedirect;

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

    Route::get('/payment/redirect', PaymentRedirect::class)->name('payment.redirect');

    Route::get('/payment/success', PaymentSuccess::class)->name('payment.success');

    Route::get('/payment/failed', PaymentFailed::class)->name('payment.failed');

    Route::get('/order/checkout-retry', function () {
        return view('register.pages.checkout-retry');
    })->name('order.checkout-retry');
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
