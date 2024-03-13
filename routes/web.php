<?php

use App\Http\Controllers\Web as Web;
use App\Http\Controllers\Web\Auth as Auth;
use Illuminate\Support\Facades\Route;

Route::get('/docs', [Web\DocsController::class, 'index'])->name('docs');

Route::middleware('guest')->group(function () {
    Route::get('/', [Web\SiteController::class, 'index'])->name('index');
    Route::get('register', [Auth\RegisterController::class, 'create'])->name('register');
    Route::post('register', [Auth\RegisterController::class, 'store']);
    Route::get('register/callback', [Auth\SocialRegisterController::class, 'callback']);
    Route::post('register/{provider}', [Auth\SocialRegisterController::class, 'redirect'])->name('social.auth');
    Route::get('login', [Auth\LoginController::class, 'create'])->name('login');
    Route::post('login', [Auth\LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [Auth\LoginController::class, 'destroy'])->name('logout');
    Route::get('home', [Web\WeatherController::class, 'index'])->name('home');
});
