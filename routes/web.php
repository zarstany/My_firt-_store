<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Cart\AddProductController;
use App\Http\Controllers\Cart\CartSummaryController;
use App\Http\Controllers\Cart\HistoryOrderController;
use App\Http\Controllers\Cart\RemoveProductController;
use App\Http\Controllers\Checkout\CheckoutController;
use App\Http\Controllers\Checkout\CreateOrderController;
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('register', RegisterController::class);
Route::post('register', CreateAccountController::class);
Route::get('/login', LoginController::class);
Route::post('/login', AuthenticationController::class);
Route::post('/logout', LogoutController::class);
Route::get('/home', HomeController::class);
Route::post('cart/add', AddProductController::class);
Route::delete('cart/remove', RemoveProductController::class);
Route::get('cart-summary', CartSummaryController::class);
Route::get('checkout', CheckoutController::class);
Route::post('checkout', CreateOrderController::class);
Route::post('history', HistoryOrderController::class);