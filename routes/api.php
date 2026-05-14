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
//Route::post('cerrar_secion', [App\Http\Controllers\Login\UsersController::class, 'cerrar_secion']);
Route::post('iniciar_secion', [App\Http\Controllers\Login\UsersController::class, 'iniciar_secion']);
Route::apiResource('login', App\Http\Controllers\Login\UsersController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
