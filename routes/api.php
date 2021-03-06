<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TableController;
use App\Http\Controllers\Api\TimeSlotController;
use App\Http\Controllers\Api\ReservationController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('user/register',[PassportAuthController::class,'registerUser']);
Route::post('user/login',[PassportAuthController::class,'loginUser']);
Route::post('provider/register',[PassportAuthController::class,'registerProvider']);
Route::post('provider/login',[PassportAuthController::class,'loginProvider']);

Route::apiResource('restaurant', RestaurantController::class);
Route::apiResource('timeslot', TimeSlotController::class);
Route::apiResource('reservation', ReservationController::class);
Route::apiResource('table', TableController::class);

