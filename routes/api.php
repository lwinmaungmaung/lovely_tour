<?php

use App\Http\Controllers\AdminController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
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


Route::name('post_login')->post('/', [AdminController::class, 'postLogin']);
Route::middleware('auth:api')->group(function (){
   Route::name('user')->get('/user',function(){
       return new UserResource(Auth::user());
   });
});
