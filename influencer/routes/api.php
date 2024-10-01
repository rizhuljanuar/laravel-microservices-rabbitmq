<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);
Route::get('products', [\App\Http\Controllers\ProductController::class, 'index']);

Route::group([
    'middleware' => 'scope.influencer'
], function () {
    Route::post('links', [\App\Http\Controllers\LinkController::class, 'store']);
    Route::get('stats', [\App\Http\Controllers\StatsController::class, 'index']);
    Route::get('rankings', [\App\Http\Controllers\StatsController::class, 'rankings']);
});
