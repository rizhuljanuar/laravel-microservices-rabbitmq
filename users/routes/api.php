<?php

use Illuminate\Support\Facades\Route;


Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);

Route::group([
    'middleware' => 'auth:api',
], function () {
    Route::get('user', [App\Http\Controllers\AuthController::class, 'user']);
    Route::put('users/info', [App\Http\Controllers\AuthController::class, 'updateInfo']);
    Route::put('users/password', [App\Http\Controllers\AuthController::class, 'updatePassword']);

    Route::apiResource('users', App\Http\Controllers\UserController::class);

    Route::get('admin', [App\Http\Controllers\AuthController::class, 'authenticated'])->middleware('scope:admin');
    Route::get('influencer', [App\Http\Controllers\AuthController::class, 'authenticated'])->middleware('scope:influencer');
});
