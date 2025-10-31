<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Electores\ElectorController;

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
    return view('welcome');
});

// Ruta para verificar si el DNI ya está registrado
Route::get('/verificar-dni/{dni}', [ElectorController::class, 'verificarDni']);
Route::get('/registro/encontrado/{dni}', [ElectorController::class, 'encontrado'])->name('electores.encontrado');

Route::get('/registro', [ElectorController::class, 'create'])->name('electores.create');
Route::post('/registro', [ElectorController::class, 'store'])->name('electores.store');
Route::get('/registro/success/{nombre}/{ticked}', [ElectorController::class, 'success'])->name('electores.success');

