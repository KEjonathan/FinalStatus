<?php

use App\Http\Controllers\AdminAuth\AdminAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\packages\PackageController;
use App\Http\Controllers\subscriptions\AdminSubscriptionController;
use App\Http\Controllers\Whatsapp\WhatsAppAdController;
use App\Http\Controllers\Withdraw\WithdrawController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
Route::post('/packages/subscribe/{packageId}', [PackageController::class, 'subscribe'])->name('packages.subscribe');
Route::get('/bots', [HomeController::class, 'showForexBots'])->name('bots');
Route::get('/affiliates', [HomeController::class, 'show_affiliates'])->name('affiliates');
Route::get('/withdrawals_history', [HomeController::class, 'history'])->name('withdrawals history');
Route::get('pay', [HomeController::class, 'showPaymentMethods'])->name('pay methods');



// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Login Routes
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::get('/subscriptions', [AdminSubscriptionController::class, 'index'])->name('admin.subscriptions');
    Route::post('/subscriptions/{subscription}/approve', [AdminSubscriptionController::class, 'approve'])->name('admin.subscriptions.approve');


    Route::get('withdrawals', [WithdrawController::class, 'index'])->name('admin.withdrawals.index');
    Route::get('admin.withdrawals/approve/{id}', [WithdrawController::class, 'approve'])->name('admin.withdrawals.approve');
    Route::get('withdrawals/reject/{id}', [WithdrawController::class, 'reject'])->name('admin.withdrawals.reject');


    // Admin Registration Routes
    Route::get('register', [AdminAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AdminAuthController::class, 'register'])->name('register.submit');
    Route::get('show-wads', [WhatsAppAdController::class,'showAds'])->name('view whatsapp ads');

    // Admin Dashboard Route (Protected)
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('packages/create', [PackageController::class, 'create'])->name('packages.create');
        Route::post('packages/store', [PackageController::class, 'store'])->name('packages.store');
        Route::get('create-ad', [WhatsAppAdController::class, 'create'])->name('whatsapp.create');
        Route::post('store-add', [WhatsAppAdController::class, 'store'])->name('whatsapp.store');
    });
});
