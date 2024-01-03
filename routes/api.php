<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourItineraryController;
use App\Http\Controllers\TourItineraryDayController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::post('/book', [FrontController::class, 'book']);

Route::name('post_login')->post('/', [AdminController::class, 'postLogin']);
Route::middleware('auth:api')->group(function (){
    Route::apiResource('user', UserController::class);
    Route::apiResource('tour', TourController::class);
    Route::apiResource('tour.day', TourItineraryDayController::class);
    Route::apiResource('tour.day.itinerary', TourItineraryController::class);
});
