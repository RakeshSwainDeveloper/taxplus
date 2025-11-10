<?php

use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\User\ChatWidgetController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\PricingController;
use App\Http\Controllers\User\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::post('/chat-widget/reply', [ChatWidgetController::class, 'reply'])->name('chat.widget.reply');
Route::get('/', [UserController::class, 'index'])->name('user.home');
Route::get('/contact', [ContactController::class, 'index'])->name('user.contact');
Route::get('/pricing', [PricingController::class, 'show'])->name('user.pricing');
Route::get('/about', [AboutController::class, 'index'])->name('user.about');
Route::get('/service', [ServiceController::class, 'index'])->name('user.service');
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/itr-filing', [ServiceController::class, 'itrFiling'])->name('user.itr-filing');
    Route::get('/gst-filing', [ServiceController::class, 'gstFiling'])->name('user.gst-filing');
});

// Route::get('/itr-filing', [ServiceController::class, 'itrFiling'])->name('user.itr-filing');
// Route::get('/gst-filing', [ServiceController::class, 'gstFiling'])->name('user.gst-filing');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('api.register-loading');
Route::post('/register', [AuthController::class, 'register'])->name('api.register');
