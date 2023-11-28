<?php

use App\Http\Controllers\Backend as BackendController;
use App\Http\Controllers\Frontend as FrontendController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/login', [BackendController\AuthController::class, 'login'])->name('get.admin.login');
        Route::post('/login', [BackendController\AuthController::class, 'postLogin'])->name('post.admin.login');

        Route::get('/register', [BackendController\AuthController::class, 'register'])->name('get.admin.register');
        Route::get('/forget', [BackendController\AuthController::class, 'forget'])->name('get.admin.forget_pass');

        Route::get('/logout', [BackendController\AuthController::class, 'logout'])->name('get.admin.logout');
    });


    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/dashboard', [BackendController\DashboardController::class, 'index'])->name('get.admin.dashboard');
        Route::resource('/category', BackendController\CategoryController::class);
        Route::resource('/product', BackendController\ProductController::class);
        Route::resource('/banner', BackendController\BannerController::class);
        Route::resource('/customer', BackendController\CustomerController::class);
        Route::resource('/brand', BackendController\BrandController::class);
        Route::resource('/setting', BackendController\SettingController::class);
        Route::resource('/profile', BackendController\SettingController::class);
    });
});

Route::get('/', [FrontendController\HomeController::class, 'index'])->name('get.home');
Route::get('/category/{slug}', [FrontendController\CategoryController::class, 'index'])->name('get.category');
Route::get('/product/{slug}', [FrontendController\ProductController::class, 'index'])->name('get.product');
