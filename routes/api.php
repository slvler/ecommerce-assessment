<?php

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


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/auth/login',[\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');


Route::group(['middleware' => 'auth:api'], function ($router) {
    Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])->middleware('throttle:30,1');
    Route::get('/orders/{id}', [\App\Http\Controllers\OrderController::class, 'show'])->where('id', '[0-9]+')->middleware('throttle:30,1');
    Route::post('/orders', [\App\Http\Controllers\OrderController::class, 'store'])->middleware('throttle:30,1');
    Route::put('/orders/{id}', [\App\Http\Controllers\OrderController::class, 'update'])->where('id', '[0-9]+')->middleware('throttle:30,1');
    Route::delete('/orders/{id}', [\App\Http\Controllers\OrderController::class, 'delete'])->where('id', '[0-9]+')->middleware('throttle:30,1');

    Route::get('/discount', [\App\Http\Controllers\DiscountController::class, 'index'])->middleware('throttle:30,1');

});
