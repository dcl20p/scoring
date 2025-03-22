<?php

use App\Http\Controllers\Auth\RegisteredController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.landing');
})->name('landing');

// Language Route
Route::get('language/{locale}', [LanguageController::class, 'change'])->name('language.change');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredController::class, 'registerAdmin'])->name('register.store');
    Route::get('/register/{school_code}', [RegisteredController::class, 'registerMember'])->name('register.member');

    
    Route::get('/login', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login.store');

    Route::get('/forgot-password', function() {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::get('/reset-password/{token', function() {
        return view('auth.login');
    })->name('password.reset');

    // Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    // Route::post('/login', [LoginController::class, 'login']);
    
    // Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    // Route::post('/register', [RegisterController::class, 'register']);
    
    // Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    // Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    
    // Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    // Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [SessionController::class,'destroy'])->name('logout');

    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
});

// Terms and Privacy Policy routes
Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');

// Contact routes
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submit');
