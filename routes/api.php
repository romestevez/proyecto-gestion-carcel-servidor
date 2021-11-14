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
Route::post('login', [\App\Http\Controllers\Users::class, 'login']);
Route::post('createUser', [\App\Http\Controllers\Users::class, 'createUser']);

Route::middleware('auth:sanctum')->group(function () {
    


    //Trabajadores
    Route::get('user', [\App\Http\Controllers\Users::class, 'user']);
    Route::put('update/user/{id}', [\App\Http\Controllers\Users::class, 'updateUser']);
    Route::post('logout', [\App\Http\Controllers\Users::class, 'logout']);
    Route::get('user/{id}', [\App\Http\Controllers\Users::class, 'showUser']);
    Route::get('mostrarusers', [\App\Http\Controllers\Users::class, 'showAllUser']);
    Route::post('user/info', [\App\Http\Controllers\Users::class, 'userInfo']);

    Route::delete('delete/user/{id}', [\App\Http\Controllers\Users::class, 'deleteUser']);



    //Reclusos
    Route::post('createRecluso', [\App\Http\Controllers\ReclusoController::class, 'createRecluso']);

    Route::put('update/recluso/{id}', [\App\Http\Controllers\ReclusoController::class, 'updateRecluso']);

    Route::get('recluso/{id}', [\App\Http\Controllers\ReclusoController::class, 'showRecluso']);

    Route::delete('delete/recluso/{id}', [\App\Http\Controllers\ReclusoController::class, 'deleteRecluso']);
    
    Route::get('mostrarreclusos', [\App\Http\Controllers\ReclusoController::class, 'showAllReclusos']);



    //Celdas
    Route::post('createCelda', [\App\Http\Controllers\CeldasController::class, 'createCelda']);

    Route::put('update/celda/{id}', [\App\Http\Controllers\CeldasController::class, 'updateCelda']);

    Route::get('celda/{id}', [\App\Http\Controllers\CeldasController::class, 'showCelda']);

    Route::delete('delete/celda/{id}', [\App\Http\Controllers\CeldasController::class, 'deleteCelda']);


    //Modulos
    Route::post('createModulo', [\App\Http\Controllers\ModulosController::class, 'createModulo']);

    Route::put('update/modulo/{id}', [\App\Http\Controllers\ModulosController::class, 'updateModulo']);

    Route::get('modulo/{id}', [\App\Http\Controllers\ModulosController::class, 'showModulo']);

    Route::delete('delete/modulo/{id}', [\App\Http\Controllers\ModulosController::class, 'deleteModulo']);

    //Historial
    Route::post('createHistorial', [\App\Http\Controllers\HistorialController::class, 'createHistorial']);

    Route::put('update/historial/{id}', [\App\Http\Controllers\HistorialController::class, 'updateHistorial']);

    Route::get('historial/{id}', [\App\Http\Controllers\HistorialController::class, 'showHistorial']);

    Route::delete('delete/historial/{id}', [\App\Http\Controllers\HistorialController::class, 'deleteHistorial']);
});