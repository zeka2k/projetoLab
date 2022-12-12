<?php

use App\Http\Controllers\RoutingController;
use App\Http\Controllers\ClientController;
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

//-----> Parecido com controlers mais simples para mais complexos fazer no controlador
Route::get('/', [RoutingController::class, 'index']);
Route::get('/about', [RoutingController::class, 'about']);


Route::get('/clients', [ClientController::class, 'index']);
Route::get('/clients/create', [ClientController::class, 'create']);
Route::post('/clients', [ClientController::class, 'store']);

Route::get('/clients/show/{client}', [ClientController::class, 'show']);
Route::get('/clients/edit/{client}', [ClientController::class, 'edit']);
Route::post('/clients/update/{client}', [ClientController::class, 'update']);
Route::post('/clients/destoy/{client}', [ClientController::class, 'destroy']);