<?php

use App\Http\Controllers\ImageCompress;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
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


Route::get('/like/{id}',[LikeController::class,'like']);
Route::get('/dislike/{id}',[LikeController::class,'dislike']);
Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login-proses',[LoginController::class,'loginProses']);
Route::get('compress',[ImageCompress::class,'index']);
Route::post('compress/act',[ImageCompress::class,'com']);
Route::group(['middleware'=>['auth','role:1']],function(){
    Route::get('/', [LikeController::class,'index']);
    Route::get('/detail/{id}',[LikeController::class,'detail']);
    Route::get('/add/artikel', [LikeController::class,'addArtikel']);
    Route::post('/home', [LoginController::class,'index']);
    Route::post('/add', [LikeController::class,'add']);
    Route::get('/vote/{id}/{content_id}',[LikeController::class,'vote']);
    
});
Route::group(['middleware'=>['auth','role:2']],function(){
    Route::get('/user', function(){
        return view('logout');
    });
   
});
Route::group(['middleware'=>['auth','role:2,1']],function(){
    Route::get('/logout', [LoginController::class,'logout']);
   
});