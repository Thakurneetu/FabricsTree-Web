<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Web\CustomerRegisterController;
use App\Http\Controllers\Web\CustomerLoginController;
use App\Http\Controllers\Web\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('customer/register', [CustomerRegisterController::class, 'register'])->name('customer.register');
Route::post('customer/login', [CustomerLoginController::class, 'login'])->name('customer.login');
Route::post('customer/forgotpassword', [CustomerRegisterController::class, 'forgotpassword'])->name('customer.forgotpassword');
Route::post('customer/generatepassword', [CustomerRegisterController::class, 'generatepassword'])->name('customer.generatepassword');

Route::get('product/index', [ProductController::class, 'index'])->name('product.index');
Route::get('product/lists', [ProductController::class, 'list'])->name('product.lists');
Route::get('product/category', [ProductController::class, 'category'])->name('product.category');

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