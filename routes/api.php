<?php

use App\Http\Controllers\cliente_controller;
use App\Http\Controllers\login_controller;
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

Route::post('login', [login_controller::class, 'login']);

Route::get('cliente/list', [cliente_controller::class , 'index'])->middleware('auth:api');
Route::post('cliente/delete', [cliente_controller::class , 'delete'])->middleware('auth:api');
Route::post('cliente/save', [cliente_controller::class , 'save'])->middleware('auth:api');

//ruta para obtener el listado de transportes
Route::get('transportes/list', [cliente_controller::class , 'getTransportes']);