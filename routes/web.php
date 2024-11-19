<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('customer/register', [App\Http\Controllers\CustomerController::class, 'register'])->name('customer.register');
//Route::post('customer/login', [App\Http\Controllers\CustomerLoginController::class, 'login'])->name('customer.login');
//Route::post('customer/forgotpassword', [App\Http\Controllers\CustomerController::class, 'forgotpassword'])->name('customer.forgotpassword');
//Route::post('customer/generatepassword', [App\Http\Controllers\CustomerController::class, 'generatepassword'])->name('customer.generatepassword');

Route::group(['middleware' => 'auth'], function () {
  Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard-theme/{mode}', [DashboardController::class, 'theme'])->name('dashboard-theme');
    Route::resources([
      'customer' => CustomerController::class,
      'category' => CategoryController::class,
    ]);
  });
});
