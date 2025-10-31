<?php

use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\PricingController;
use App\Http\Controllers\User\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::get('/', [UserController::class, 'index'])->name('user.home');
Route::get('/contact', [ContactController::class, 'index'])->name('user.contact');
Route::get('/pricing', [PricingController::class, 'show'])->name('user.pricing');
Route::get('/about', [AboutController::class, 'index'])->name('user.about');
Route::get('/service', [ServiceController::class, 'index'])->name('user.service');