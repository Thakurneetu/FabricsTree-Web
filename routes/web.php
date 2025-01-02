<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ContactUsController;


use App\Http\Controllers\Web\CustomerRegisterController;
use App\Http\Controllers\Web\CustomerLoginController;
use App\Http\Controllers\Web\CustomerForgotPasswordController;
use App\Http\Controllers\Web\CustomerResetPasswordController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\ProductQuotesController;



Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::post('customer/register', [CustomerRegisterController::class, 'register'])->name('customer.register');
Route::post('customer/login', [CustomerLoginController::class, 'login'])->name('customer.login');
Route::post('customer/forgot-password', [CustomerForgotPasswordController::class, 'forgetpassword'])->name('customer.forgetpassword');
Route::post('customer/forgot-otp-verify', [CustomerResetPasswordController::class, 'forgototpverify'])->name('customer.forgototpverify');
//Route::get('customer/reset-password/{token}', [CustomerForgotPasswordController::class, 'showResetPasswordForm'])->name('customer.resetpassword.get');
Route::post('customer/reset-password', [CustomerResetPasswordController::class, 'resetpassword'])->name('customer.resetpassword');

Route::get('customer/dashboard', [CustomerLoginController::class, 'dashboard'])->name('customer.dashboard');
Route::get('customer/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');


Route::get('product', [ProductController::class,'index'])->name('product.index');
Route::get('productdetail', [ProductController::class, 'productdetail'])->name('product.productdetail');
Route::get('productcart', [ProductController::class, 'productcart'])->name('product.productcart');
Route::get('productquotes', [ProductQuotesController::class, 'index'])->name('product.productquotes');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::get('contactus', [ContactController::class, 'index'])->name('contactus');

Route::group(['middleware' => 'auth'], function () {
  Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard-theme/{mode}', [DashboardController::class, 'theme'])->name('dashboard-theme');
    Route::resources([
      'customer' => CustomerController::class,
      'category' => CategoryController::class,
      'subcategory' => SubcategoryController::class,
      'requirement' => RequirementController::class,
      'tag' => TagController::class,
      'product' => AdminProductController::class,
      'contact-us' => ContactUsController::class,
      'testimonial' => TestimonialController::class,
    ]);
    Route::post('/delete-product-image', [AdminProductController::class, 'deleteImage'])->name('delete-product-image');
  });
});