<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TableController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('category', CategoryController::class)->only('index');

Route::apiResource('restaurant', RestaurantController::class);

Route::apiResource('reservation', ReservationController::class)->only(['index','show','store'])->middleware('auth');

Route::apiResource('table', TableController::class);
