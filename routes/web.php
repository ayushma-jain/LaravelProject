<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'loadDashboardView'])->name('dashboard');
Route::get('/google-map', [App\Http\Controllers\HomeController::class, 'loadGoogleMapView'])->name('google-map');
Route::get('/mail', [App\Http\Controllers\HomeController::class, 'loadSendEmailView'])->name('mail');
Route::get('/payment-gateway', [App\Http\Controllers\HomeController::class, 'loadPaymentGatewayView'])->name('payment-gateway');
Route::post('/send-mail',[App\Http\Controllers\HomeController::class, 'sendMail'])->name('send-mail');

//Payment Gateway APIs
Route::get('/stripe',[App\Http\Controllers\PaymentGatewayController::class,'stripe']);
Route::post('/stripe',[App\Http\Controllers\PaymentGatewayController::class,'stripePost'])->name('stripe.post');