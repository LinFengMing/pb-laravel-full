<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/pb', function () {
    return view('pb');
});

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::patch('/cart/cookie', [CartController::class, 'updateCookie'])->name('cart.cookie.update');
Route::resource('cart', CartController::class);
