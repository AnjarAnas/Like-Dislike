<?php

use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LikeController::class,'index']);
Route::get('/like/{id}',[LikeController::class,'like']);
Route::get('/dislike/{id}',[LikeController::class,'dislike']);
