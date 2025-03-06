<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Route::get('auth/register', 'pages.auth.register')
    //     ->name('register');

    Route::get('auth/login', \App\Livewire\Pages\Auth\Login::class)->name('login');
});