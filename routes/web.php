<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripeHostedController;




Route::get('/payment', [PaymentController::class, 'showForm']);
Route::post('/payment', [PaymentController::class, 'processPayment']);



Route::get('/checkout', [StripeHostedController::class, 'index'])->name('index');
Route::post('/checkout', [StripeHostedController::class, 'checkout'])->name('checkout');
Route::get('/success', [StripeHostedController::class, 'success'])->name('success');
