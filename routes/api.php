<?php

use App\Http\Controllers\TipoImpresoras\TipoImpresoraController;
use App\Models\TipoImpresora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Colores\ColoresController;
use App\Http\Controllers\Nomenclaturas\NomenclaturaController;
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

Route::apiResource('nomenclaturas', NomenclaturaController::class);
Route::apiResource('colores', ColoresController::class);
Route::apiResource('tipos_impresoras', TipoImpresoraController::class);
Route::apiResource('modelos', App\Http\Controllers\Modelo\ModelosController::class);
Route::apiResource('categorias', App\Http\Controllers\Categorias\CategoriasController::class);
Route::apiResource('marcas', App\Http\Controllers\Marcas\MarcasController::class);
Route::apiResource('login', App\Http\Controllers\Login\UsersController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
