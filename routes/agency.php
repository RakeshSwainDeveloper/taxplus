<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agency\AgencyController;

Route::get('/', [AgencyController::class, 'index'])->name('agency.dashboard');
