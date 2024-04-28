<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::controller(LoginRegisterController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

Route::group(['middleware' => 'cors'], function () {
    Route::controller(SocialiteController::class)->group(function() {
        Route::get('/{provider}/redirectgister', 'loginSocial');
        Route::any('/{provider}/callback', 'callbackSocial');
    });
});


Route::controller(ForgotPasswordController::class)->group(function() {
    Route::post('/forgot-password', 'forgotPassword');
    Route::post('/reset-password', 'resetPassword');
});


Route::middleware('auth:sanctum')->group( function () {

    Route::post('/logout', [LoginRegisterController::class, 'logout']);
    Route::post('/profile', [ProfileController::class, 'update']);
    
});
