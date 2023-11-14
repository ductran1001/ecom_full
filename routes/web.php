<?php

use App\Http\Controllers\Backend as BackendController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/dang-nhap', [BackendController\AuthController::class, 'login'])->name('get.admin.login');
    Route::post('/dang-nhap', [BackendController\AuthController::class, 'postLogin'])->name('post.admin.login');

    Route::get('/dang-ki', [BackendController\AuthController::class, 'register'])->name('get.admin.register');
    Route::get('/quen-mat-khau', [BackendController\AuthController::class, 'forget'])->name('get.admin.forget_pass');

    Route::get('/dang-xuat', [BackendController\AuthController::class, 'logout'])->name('get.admin.logout');

    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/tong-quan', [BackendController\HomeController::class, 'index'])->name('get.admin.home');
    });
});
