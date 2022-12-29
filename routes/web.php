<?php

use App\Http\Controllers\RoutingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ChatsController;
use Faker\Guesser\Name;
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
Route::get('/adverts', [ClientController::class, 'index'])->name('clients.index');
Route::get('/adverts/myAdverts', [ClientController::class, 'indexMyAdverts'])->name('clients.myadverts');
Route::get('/adverts/create', [ClientController::class, 'create'])->name('clients.create')->middleware('verified');
Route::post('/adverts', [ClientController::class, 'store'])->name('clients.store');
Route::get('/adverts/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/adverts/admin/{client}', [ClientController::class, 'showAdmin'])->name('clients.showAdmin');
Route::get('/adverts/myAdverts/{client}', [ClientController::class, 'showMyAdverts'])->name('clients.showMyAdverts');
Route::get('/adverts/edit/{client}', [ClientController::class, 'edit'])->name('clients.edit');
Route::get('/adverts/admin/edit/{client}', [ClientController::class, 'editAdmin'])->name('clients.editAdmin');
Route::put('/adverts/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::put('/adverts/admin/{client}', [ClientController::class, 'updateAdmin'])->name('clients.updateAdmin');
Route::delete('/adverts/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::delete('/adverts/admin/{client}', [ClientController::class, 'destroyAdmin'])->name('clients.destroyAdmin');

//-->Authentication
Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//-->Photo
Route::post('save', [PhotoController::class, 'store'])->name('upload.picture')->middleware('verified');

//-->Messages
Route::get('/chat', [ChatsController::class, 'index'])->name('chat.index');
Route::post('/chat', [ChatsController::class, 'changeCurrentUser'])->name('chat.changeCurrentUser');
Route::post('/messages', [ChatsController::class, 'sendMessage']);
