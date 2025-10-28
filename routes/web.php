





<?php

use Illuminate\Support\Facades\Route;

// Main '/' handled by agency routes
require base_path('routes/user.php');

// User routes (prefix /user)
Route::prefix('agency')->group(function () {
    require base_path('routes/agency.php');
});

// Admin routes (prefix /admin)
Route::prefix('admin')->group(function () {
    require base_path('routes/admin.php');
});
