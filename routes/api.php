<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CustomerAuthController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\NotificationController;


Route::controller(CustomerAuthController::class)->group(function(){
  Route::post('/login', 'login');
  Route::post('/register', 'register');
  Route::post('/send-forgot-otp', 'sendForgotOTP');
  Route::post('/verify-otp', 'verifyOTP');
  Route::post('/reset-password', 'resetPassword');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/profile', function (Request $request) {
        return $request->user();
    });
    Route::post('/profile', [CustomerAuthController::class, 'profile']);
    Route::post('/change-password', [CustomerAuthController::class, 'changePassword']);
    Route::apiResource('notification', NotificationController::class);
    Route::controller(HomeController::class)->group(function(){
      Route::get('/dashboard', 'dashboard');
      Route::get('/categories', 'categories');
      Route::get('/subcategories/{id}', 'subcategories');
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
      Route::post('/cart/submit', 'submitEnquiry');
      Route::post('/revoke-enquiry', 'revokeEnquiry');
      Route::get('/quotes', 'quotes');
      Route::get('/quote/{id}', 'quoteDetails');
      Route::get('/accept/{id}', 'accept');
      Route::get('/orders', 'orders');
      Route::post('/revoke-order', 'revokeOrder');
    });
});


use App\Http\Controllers\API\Manufacturer\ManufacturerAuthController;
use App\Http\Controllers\API\Manufacturer\ManufacturerProductController;
use App\Http\Controllers\API\Manufacturer\ManufacturerEnquiryController;
use App\Http\Controllers\API\Manufacturer\DashboardController;

Route::group(['prefix' => 'manufacturer'], function () {
  Route::post('/register', [ManufacturerAuthController::class, 'register']);
  Route::post('/login', [ManufacturerAuthController::class, 'login']);

  Route::middleware('auth:sanctum')->group(function () {
      Route::get('/profile', function (Request $request) {
        return $request->user();
      });
      Route::post('/change-password', [ManufacturerAuthController::class, 'changePassword']);
      Route::apiResource('notification', NotificationController::class);
      Route::post('/profile', [ManufacturerAuthController::class, 'profile']);
      Route::get('/dashboard', [DashboardController::class, 'dashboard']);
      Route::post('/logout', [ManufacturerAuthController::class, 'logout']);
      Route::apiResource('product', ManufacturerProductController::class);
      Route::apiResource('enquiry', ManufacturerEnquiryController::class);
    });
    
  });

  // curl -X PUT -F "name=John Doe" -F "email=john.doe@example.com" http://127.0.0.1:8000/api/enquiry/6
