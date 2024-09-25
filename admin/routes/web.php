<?php

use Illuminate\Support\Facades\Route;


Route::get('user', [App\Http\Controllers\AuthController::class, 'user']);

// Admin
Route::group([
    'middleware' => 'scope.admin',
], function () {
    Route::get('chart', [App\Http\Controllers\DashboardController::class, 'chart']);
    Route::post('upload', [App\Http\Controllers\ImageController::class, 'upload']);
    Route::get('export', [App\Http\Controllers\OrderController::class, 'export']);

    Route::apiResource('users', App\Http\Controllers\UserController::class);
    Route::apiResource('roles', App\Http\Controllers\RoleController::class);
    Route::apiResource('products', App\Http\Controllers\ProductController::class);
    Route::apiResource('orders', App\Http\Controllers\OrderController::class)->only('index', 'show');
    Route::apiResource('permissions', App\Http\Controllers\PermissionController::class)->only('index');
});
