<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [HomeController::class,'home']);

Route::prefix('/admin')->group(function () {
    Route::get("/articles",[ArticleController::class,'index']);
    Route::get('/article/create', [ArticleController::class,'create']);
    Route::post('/article/create',[ArticleController::class,'store']);
    Route::delete("/articles/delete/{id}",[ArticleController::class,'delete']);
    Route::get('/article/edit/{id}', [ArticleController::class,'edit']);
    Route::put('/article/edit/{id}', [ArticleController::class,'update']);



});



