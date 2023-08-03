<?php

use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\ClientesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('clientes', [ClientesController::class, 'index']);

Route::post('clientes', [ClientesController::class, 'store']);

Route::put('clientes/{id}', [ClientesController::class, 'update']);

Route::delete('clientes/{id}', [ClientesController::class, 'destroy']);

Route::post('/register', [AutenticacionController::class, 'register']);
Route::post('/login', [AutenticacionController::class, 'login']);



