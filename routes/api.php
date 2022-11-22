<?php

use App\Http\Controllers\cliente_controller;
use App\Http\Controllers\login_controller;
use App\Http\Controllers\tipo_controller;
use App\Http\Controllers\carro_controller;
use App\Http\Controllers\cajon_controller;
use App\Http\Controllers\estacionamiento_controller;
use App\Http\Controllers\administrador_controller;
use App\Http\Controllers\reserva_controller;
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

//ruta para el login
Route::post('login', [login_controller::class, 'login']);

//ruta para el CRUD de la tabla cliente
Route::get('cliente/list', [cliente_controller::class , 'index'])->middleware('auth:api');
Route::post('cliente/delete', [cliente_controller::class , 'delete'])->middleware('auth:api');
Route::post('cliente/save', [cliente_controller::class , 'save'])->middleware('auth:api');

//Crud para la tabla "tipo"
Route::get('tipo/list', [tipo_controller::class , 'index'])->middleware('auth:api');
Route::post('tipo/delete', [tipo_controller::class , 'delete'])->middleware('auth:api');
Route::post('tipo/save', [tipo_controller::class , 'save'])->middleware('auth:api');

//obtener los valores de la tabla Carro
Route::get('carro/list', [carro_controller::class , 'index'])->middleware('auth:api');
Route::post('carro/delete', [carro_controller::class , 'delete'])->middleware('auth:api');
Route::post('carro/save', [carro_controller::class , 'save'])->middleware('auth:api');

//obtener los valores de la tabla cajon
Route::get('cajon/list', [cajon_controller::class , 'index'])->middleware('auth:api');
Route::post('cajon/delete', [cajon_controller::class , 'delete'])->middleware('auth:api');
Route::post('cajon/save', [cajon_controller::class , 'save'])->middleware('auth:api');

//obtener los valores de la tabla estacionamiento
Route::get('estacionamiento/list', [estacionamiento_controller::class , 'index'])->middleware('auth:api');
Route::post('estacionamiento/delete', [estacionamiento_controller::class , 'delete'])->middleware('auth:api');
Route::post('estacionamiento/save', [estacionamiento_controller::class , 'save'])->middleware('auth:api');

//obtener los valores de la tabla administador
Route::get('administrador/list', [administrador_controller::class , 'index'])->middleware('auth:api');
Route::post('administrador/delete', [administrador_controller::class , 'delete'])->middleware('auth:api');
Route::post('administrador/save', [administrador_controller::class , 'save'])->middleware('auth:api');

//obtener los valores de la tabla reserva
Route::get('reserva/list', [reserva_controller::class , 'index'])->middleware('auth:api');
Route::post('reserva/delete', [reserva_controller::class , 'delete'])->middleware('auth:api');
Route::post('reserva/save', [reserva_controller::class , 'save'])->middleware('auth:api');
    


// ->middleware('auth:api')
// ->middleware('auth:api')
// ->middleware('auth:api')