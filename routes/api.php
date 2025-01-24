<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CustomerAuthController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\OrderController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CustomerAuthController::class)->group(function(){
  Route::post('/login', 'login');
  Route::post('/register', 'register');
  Route::post('/send-forgot-otp', 'sendForgotOTP');
  Route::post('/verify-otp', 'verifyOTP');
  Route::post('/reset-password', 'resetPassword');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', function (Request $request) {
        return $request->user();
    });
    Route::post('/profile', [CustomerAuthController::class, 'profile']);
    Route::controller(HomeController::class)->group(function(){
      Route::get('/categories', 'categories');
      Route::get('/testimonials', 'testimonials');
      Route::post('/contact-us', 'saveContactUs');
    });
    Route::controller(ProductsController::class)->group(function(){
      Route::post('/products', 'products');
      Route::get('/filters', 'filters');
    });
    Route::controller(OrderController::class)->group(function(){
      Route::get('/cart/list', 'getCart');
      Route::post('/cart/add', 'addToCart');
      Route::get('/cart/delete/{id}', 'deleteCart');
    });
});

