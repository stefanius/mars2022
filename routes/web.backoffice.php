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

Route::group(['middleware' => ['auth', 'user.locale']], function () {
    Route::resource('/', 'Home\HomeController', ['only' => ['index']]);

    Route::resource('profile', 'Profile\ProfileController', ['only' => ['index']]);

    Route::resource('addresses', 'Addresses\AddressesController');

    Route::resource('orders', 'Orders\OrdersController', ['only' => ['index', 'show', 'create', 'store']]);
    Route::resource('order.print', 'Orders\OrderPrintController', ['only' => ['index']]);

    Route::resource('inventory', 'Inventory\InventoryController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::resource('seasons', 'Seasons\SeasonsController', ['only' => ['index', 'show', 'create', 'store']]);

    Route::get('statistics/orders', 'Statistics\OrderStatisticsController')->name('statistics.orders');

    Route::get('ticket-booth', 'TicketBooth\TicketBoothController@index')->name('ticket-booth.index');
    Route::get('ticket-booth/order-searcher', 'TicketBooth\TicketBoothController@orderSearcher')->name('ticket-booth.order-searcher');
    Route::get('ticket-booth/sales', 'TicketBooth\TicketBoothController@sales')->name('ticket-booth.sales');
    Route::get('ticket-booth/pre-order', 'TicketBooth\TicketBoothController@preorder')->name('ticket-booth.pre-order');
    Route::get('ticket-booth/medals', 'TicketBooth\TicketBoothController@medals')->name('ticket-booth.medals');

    Route::resource('order-payments', 'Orders\OrderPaymentsController', ['only' => ['index', 'show', 'create', 'store']])->parameter('OrderPayment', 'Order');
});

require __DIR__ . '/auth.php';
