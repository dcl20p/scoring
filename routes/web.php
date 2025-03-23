<?php

use App\Http\Controllers\Auth\RegisteredController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LogController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Landing page
Route::get('/', fn() => view('pages.landing'))->name('landing');

// Language switcher
Route::get('language/{locale}', [LanguageController::class, 'change'])->name('language.change');

// Guest routes
Route::middleware('guest')->group(function () {
    // Registration
    Route::controller(RegisteredController::class)->group(function () {
        Route::get('/register', 'create')->name('register');
        Route::post('/register', 'registerAdmin')->name('register.store');
        Route::get('/register/{school_code}', 'registerMember')->name('register.member');
    });

    // Authentication
    Route::controller(SessionController::class)->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store')->name('login.store');
    });

    // Password Reset
    Route::get('/forgot-password', fn() => view('auth.forgot-password'))->name('password.request');
    Route::get('/reset-password/{token}', fn() => view('auth.login'))->name('password.reset');
});

// Email verification
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', fn() => view('auth.verify-email'))->name('verification.notice');
    
    Route::middleware('signed')->get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('dashboard')->with('success', __('auth.email_verified'));
    })->name('verification.verify');
    
    Route::middleware('throttle:6,1')->post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('success', __('auth.verification_link_sent'));
    })->name('verification.send');
});

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
});

// Public pages
Route::get('/terms', fn() => view('pages.terms'))->name('terms');
Route::get('/privacy', fn() => view('pages.privacy'))->name('privacy');

// Contact
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'showContactForm')->name('contact');
    Route::post('/contact', 'submitContactForm')->name('contact.submit');
});
