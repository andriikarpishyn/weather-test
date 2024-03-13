<?php

use App\Http\Controllers\Api\Auth as Auth;
use App\Http\Controllers\Api as Api;
use Illuminate\Support\Facades\Route;

Route::post('login', [Auth\LoginController::class, 'store']);
Route::post('register', [Auth\RegisterController::class, 'store']);
Route::get('register/callback', [Auth\SocialRegisterController::class, 'callback']);
Route::post('register/{provider}', [Auth\SocialRegisterController::class, 'redirect']);

Route::get('home', [Api\WeatherController::class, 'index'])->middleware('auth:sanctum');
