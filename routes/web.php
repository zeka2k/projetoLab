<?php

use App\Http\Controllers\RoutingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
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

//-->Default/about
Route::get('/', function () {
  return view('welcome');
});
Route::get('/about', [RoutingController::class, 'about']);

//-->Adverts
Route::get('/adverts', [ClientController::class, 'index']);
Route::get('/adverts/create', [ClientController::class, 'create'])->middleware('verified');
Route::post('/adverts', [ClientController::class, 'store']);
Route::get('/adverts/show/{client}', [ClientController::class, 'show']);
Route::get('/adverts/edit/{client}', [ClientController::class, 'edit']);
Route::post('/adverts/update/{client}', [ClientController::class, 'update']);
Route::post('/adverts/destroy/{client}', [ClientController::class, 'destroy']);

//-->Authentication
Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//-->Photo
Route::post('save', [PhotoController::class, 'store'])->name('upload.picture')->middleware('is_admin');//so o admin pode enviar fotos
