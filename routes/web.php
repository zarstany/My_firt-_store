<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Cart\AddProductController;
use App\Http\Controllers\Cart\CartSummaryController;
use App\Http\Controllers\Cart\HistoryOrderController;
use App\Http\Controllers\Cart\RemoveProductController;
use App\Http\Controllers\Checkout\CreateOrderController;
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Products\CreateProductController;
use App\Http\Controllers\Products\CreateProductViewController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', HomeController::class);


Route::middleware('auth')->group(function () {
    Route::post('cart/add', AddProductController::class);
    Route::delete('cart/remove', RemoveProductController::class);
    Route::get('cart-summary', CartSummaryController::class);
    Route::post('checkout', CreateOrderController::class);
    Route::post('history', HistoryOrderController::class);
    Route::middleware('access')->group(function () {
        //Aqui iran los controladores que necesiten ser administradores
        Route::get('store/products', CreateProductViewController::class);
        Route::post('crear/products', CreateProductController::class);
    });
});

//Register Blade
Route::get('register', RegisterController::class);
//Register Controller
Route::post('register', CreateAccountController::class);
//login blade
Route::get('/login', LoginController::class);
//Login controller
Route::post('/login/user', AuthenticationController::class);
//logout
Route::post('/logout', LogoutController::class);
