<?php

use App\Http\Controllers\ProductApiController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Mail;
use App\Mail\GuiEmail;

use App\Http\Controllers\HomeController;
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('/login',[HomeController::class,'postlogin']);
Route::get('/register',[HomeController::class,'register'])->name('register');
Route::post('/register',[HomeController::class,'postregister']);
Route::get('/logout', function(){
    Auth::logout();
    return redirect()->route('home');})->name('logout');

Route::get('/changePassword', [HomeController::class, 'changePassword'])->name('changePassword');
Route::post('/changePassword', [HomeController::class, 'postchangePassword']);

// Route::get('/forgot-password', [HomeController::class, 'forgotPasswordForm'])->name('password.request');
// Route::post('/forgot-password', [HomeController::class, 'sendResetLinkEmail']);

// Route::get('/reset-password/{token}', [HomeController::class, 'resetPasswordForm'])->name('password.reset');
// Route::post('/reset-password', [HomeController::class, 'resetPassword'])->name('password.update');

Route::get('/update_password', [HomeController::class, 'updatePassword'])->name('update_password');
Route::post('/update_password', [HomeController::class, 'handleUpdatePassword'])->name('update_password');

Route::get('/get_password', [HomeController::class, 'getPassword'])->name('get_password');
Route::post('/get_password', [HomeController::class, 'handleGetPassword'])->name('get_password');
Route::post('/new_password', [HomeController::class, 'handleUpdateNewPassword'])->name('new_password');


Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
Route::prefix('api')->group(function(){
    Route::get('/comments/product/{product_id}', [CommentController::class, 'product']);
    Route::resource('/comments', CommentController::class);
    Route::resource('/cart', CartController::class);
    Route::resource('/products', ProductApiController::class);
    // Route::resource('/products/{product_id}', ProductApiController::class);
  
  
});


Route::prefix('admin')->middleware(AdminMiddleware::class)->group(function(){
    Route::get('/',[AdminController::class, 'dashboard']);
});
use App\Http\Controllers\CategoryController;
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');




Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('products.detail');


Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart', [CartController::class, 'checkout']);


Route::get('/search', function(){
    $results = searchInTable('users', 'ulueilwitz');
    dd($results);
});

Route::get('/order', [AdminController::class, 'order'])->name('order');
Route::get('/order/detail/{id}', [AdminController::class, 'order_detail']);
Route::get('orders/{order}', [AdminController::class, 'show'])->name('orders.show');
// routes/web.php
Route::get('orders/track/{order}', [AdminController::class, 'track'])->name('orders.track');


// Route::get('/mail', function () {
// Mail::to('khanglmps28698@fpt.edu.vn')->send(new GuiEmail());
// });













