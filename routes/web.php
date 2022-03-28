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

Route::view('/', 'index')->name('home');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(
    [
        // 'middleware' => 'auth',
        'namespace' => 'App\Http\Controllers'
    ],
    function () {
        Route::get('addresses/create/{customer}', 'AddressController@create')->name('addresses.create');
        Route::get('orders/create/{customer}', 'OrderController@create')->name('orders.create');

        Route::resource('addresses', AddressController::class)->except(['create', 'index', 'show']);
        Route::resource('customers', CustomerController::class)->except('show');
        Route::resource('details', DetailController::class)->except('show');
        Route::resource('orders', OrderController::class)->except('create');
        Route::resource('products', ProductController::class)->except('show');
    }
);
