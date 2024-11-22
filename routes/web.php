<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CategoryController;


use App\Http\Controllers\Web\CustomerRegisterController;
use App\Http\Controllers\Web\CustomerLoginController;
use App\Http\Controllers\Web\CustomerForgotPasswordController;
use App\Http\Controllers\Web\CustomerResetPasswordController;
use App\Http\Controllers\Web\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('customer/register', [CustomerRegisterController::class, 'register'])->name('customer.register');
Route::post('customer/login', [CustomerLoginController::class, 'login'])->name('customer.login');
Route::post('customer/forgot-password', [CustomerForgotPasswordController::class, 'forgetpassword'])->name('customer.forgetpassword');
Route::get('customer/reset-password/{token}', [CustomerForgotPasswordController::class, 'showResetPasswordForm'])->name('customer.resetpassword.get');
Route::post('customer/reset-password', [CustomerResetPasswordController::class, 'resetpassword'])->name('customer.resetpassword');

Route::get('customer/dashboard', [CustomerLoginController::class, 'dashboard'])->name('customer.dashboard');
Route::get('customer/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');


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