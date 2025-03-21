<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ManufacturerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\OrderController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;


use App\Http\Controllers\Web\CustomerRegisterController;
use App\Http\Controllers\Web\CustomerLoginController;
use App\Http\Controllers\Web\CustomerForgotPasswordController;
use App\Http\Controllers\Web\CustomerResetPasswordController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\ProductQuotesController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProductOrderController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('admin-login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('customer/register', [CustomerRegisterController::class, 'register'])->name('customer.register');
Route::post('customer/uploadstorelogo', [CustomerRegisterController::class, 'uploadstorelogo'])->name('customer.uploadstorelogo');
Route::post('customer/login', [CustomerLoginController::class, 'login'])->name('customer.login');
Route::post('customer/forgot-password', [CustomerForgotPasswordController::class, 'forgetpassword'])->name('customer.forgetpassword');
Route::post('customer/forgot-otp-verify', [CustomerForgotPasswordController::class, 'forgototpverify'])->name('customer.forgototpverify');
Route::post('customer/resent-otp', [CustomerForgotPasswordController::class, 'resent_otp'])->name('customer.resent_otp');
Route::post('customer/reset-password', [CustomerResetPasswordController::class, 'resetpassword'])->name('customer.resetpassword');

Route::get('customer/dashboard', [CustomerLoginController::class, 'dashboard'])->name('customer.dashboard');
Route::get('customer/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');

Route::get('product', [ProductController::class,'index'])->name('product.index');
Route::post('product-filter', [ProductController::class,'filter'])->name('product.filter');
Route::get('productdetail/{id?}', [ProductController::class, 'productdetail'])->name('product.productdetail');

Route::get('productcart', [ProductController::class, 'productcart'])->name('product.productcart');

Route::get('addtocart', [ProductController::class, 'addtocart'])->name('product.addtocart');
Route::get('deletecart', [ProductController::class, 'deletecart'])->name('product.deletecart');
Route::get('requestaquotes', [ProductController::class, 'requestaquotes'])->name('product.requestaquotes');
Route::post('requestaquotesrevoke', [ProductQuotesController::class, 'requestQuotesRevoke'])->name('product.requestaquotesrevoke');
 
Route::get('orders', [ProductOrderController::class, 'index'])->name('product.orders');
Route::get('quotesitems/{id?}', [ProductQuotesController::class, 'quotesitems'])->name('product.quotesitems');

Route::get('productquotes', [ProductQuotesController::class, 'index'])->name('product.productquotes');
Route::post('uploadquotes', [ProductQuotesController::class, 'uploadquotes'])->name('product.uploadquotes');


Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('update-profile', [ProfileController::class, 'update_profile'])->name('customer.updateprofile');
Route::post('change-password', [ProfileController::class, 'change_password'])->name('customer.changepassword');

Route::get('contactus', [ContactController::class, 'index'])->name('contactus');
Route::post('save-contactus', [ContactController::class, 'save_contactus'])->name('save.contactus');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

Route::prefix('admin')->name('admin.')->group(function() {
  Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
  Route::post('login', [LoginController::class, 'login']);
  Route::post('logout', [LoginController::class, 'logout'])->name('logout');
  Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
  Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

  Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard-theme/{mode}', [DashboardController::class, 'theme'])->name('dashboard-theme');
    Route::resources([
      'customer' => CustomerController::class,
      'manufacturer' => ManufacturerController::class,
      'category' => CategoryController::class,
      'subcategory' => SubcategoryController::class,
      'requirement' => RequirementController::class,
      'tag' => TagController::class,
      'product' => AdminProductController::class,
      'contact-us' => ContactUsController::class,
      'testimonial' => TestimonialController::class,
      'enquiry' => EnquiryController::class,
      'order' => OrderController::class,
    ]);
    Route::get('manufacturer-product/{id}', [ManufacturerController::class, 'product'])->name('manufacturer-product.show');
    Route::post('/delete-product-image', [AdminProductController::class, 'deleteImage'])->name('delete-product-image');
  });
});