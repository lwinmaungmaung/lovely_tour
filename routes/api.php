<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourItineraryController;
use App\Http\Controllers\TourItineraryDayController;
use App\Http\Controllers\UserController;
use App\Http\Resources\UserResource;
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

Route::prefix('/public')->group(function () {
    Route::get('/tour', [FrontController::class, 'getTours'])->name('tours');
    Route::get('/tour/{tour}', [FrontController::class, 'getTour'])->name('tours.detail');
    Route::post('/book', [FrontController::class, 'book']);
});


Route::name('post_login')->post('/login', [AdminController::class, 'postLogin']);
Route::middleware('auth:api')->group(function (){
    Route::get('/profile',function(){
        return new UserResource(Auth::user());
    });
    Route::apiResource('user', UserController::class);
    Route::apiResource('tour', TourController::class);
    Route::apiResource('tour.day', TourItineraryDayController::class);
    Route::apiResource('tour.day.itinerary', TourItineraryController::class);
    Route::apiResource('booking', BookingController::class);
});
