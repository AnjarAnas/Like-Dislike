<?php

use App\Http\Controllers\APILikeController;
use App\Http\Controllers\APILoginController;
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
// Route::post('login',[APILoginController::class,'login']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('like/{id}',[APILikeController::class,'like']);
Route::get('dislike/{id}',[APILikeController::class,'dislike']);
Route::post('post',[APILikeController::class,'post']);

