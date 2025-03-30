<?php

use App\Http\Controllers\Api\RegisteredController;
use App\Http\Controllers\Api\SessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('register', [RegisteredController::class, 'registerAdmin'])->name('api.register.store');
    Route::post('login', [SessionController::class, 'create']);
    
    Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth:sanctum', 'throttle:api');
});
