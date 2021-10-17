<?php

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


//Trabajadores
Route::post('createUser', [\App\Http\Controllers\Users::class, 'createUser']);

Route::post('update/user/{id}', [\App\Http\Controllers\Users::class, 'updateUser']);

Route::post('user/{id}', [\App\Http\Controllers\Users::class, 'showUser']);

Route::delete('delete/user/{id}', [\App\Http\Controllers\Users::class, 'delete']);

//Reclusos
Route::post('createRecluso', [\App\Http\Controllers\ReclusoController::class, 'createRecluso']);

Route::post('update/recluso/{id}', [\App\Http\Controllers\ReclusoController::class, 'updateRecluso']);

Route::post('recluso/{id}', [\App\Http\Controllers\ReclusoController::class, 'showRecluso']);

Route::delete('delete/recluso/{id}', [\App\Http\Controllers\ReclusoController::class, 'deleteRecluso']);



//Celdas
Route::post('createCelda', [\App\Http\Controllers\CeldasController::class, 'createCelda']);

Route::post('update/celda/{id}', [\App\Http\Controllers\CeldasController::class, 'updateCelda']);

Route::post('celda/{id}', [\App\Http\Controllers\CeldasController::class, 'showCelda']);

Route::delete('delete/celda/{id}', [\App\Http\Controllers\CeldasController::class, 'deleteCelda']);


//Modulos
Route::post('createModulo', [\App\Http\Controllers\ModulosController::class, 'createModulo']);

Route::post('update/modulo/{id}', [\App\Http\Controllers\ModulosController::class, 'updateModulo']);

Route::post('modulo/{id}', [\App\Http\Controllers\ModulosController::class, 'showModulo']);

Route::delete('delete/modulo/{id}', [\App\Http\Controllers\ModulosController::class, 'deleteModulo']);

//Historial
Route::post('createHistorial', [\App\Http\Controllers\HistorialController::class, 'createHistorial']);

Route::post('update/historial/{id}', [\App\Http\Controllers\HistorialController::class, 'updateHistorial']);

Route::post('historial/{id}', [\App\Http\Controllers\HistorialController::class, 'showHistorial']);

Route::delete('delete/historial/{id}', [\App\Http\Controllers\HistorialController::class, 'deleteHistorial']);