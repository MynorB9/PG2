<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicionesController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MedicionesImagenesController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('mediciones','App\Http\Controllers\MedicionesController');

Route::resource('articulos','App\Http\Controllers\ArticuloController');
Route::resource('empleados','App\Http\Controllers\EmpleadoController');
Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleados.index');

Route::resource('users','App\Http\Controllers\UsersController');
Route::get('/users', [UsersController::class, 'index'])->name('users.index');


Route::get('/cancelado', [ArticuloController::class, 'indexCancelado'])->name('cancelados.index');
Route::get('/confirmado', [ArticuloController::class, 'indexConfirmado'])->name('confirmados.index');


Route::get('/medicion/confirmar/{id}/{estado}', [MedicionesController::class, 'cambiarEstatus'])->name('medicion.cambiarEstatus');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::post('/mediciones/store/{id_medicion}', [MedicionesImagenesController::class, 'store'])->name('imagen.store');

Route::get('/mediciones/imagenes/{id_medicion}', [MedicionesImagenesController::class, 'view'])->name('imagen.view');
