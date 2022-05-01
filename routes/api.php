<?php

use App\Http\Controllers\AddcarController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/addcars',[AddcarController::class,'addcars']);
Route::get('/get-car-by/{id}',[AddcarController::class,'edit']);
Route::post('/delete-car-by/{id}',[AddcarController::class,'delete']);
Route::post('/update-car-by/{id}',[AddcarController::class,'update']);
Route::get('/get-all-cars',[AddcarController::class,'allcars']);
Route::get('/get-car-info/{id}',[AddcarController::class,'carinfo']);