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

Route::get('/registro', [ElectorController::class, 'create'])->name('electores.create');
Route::post('/registro', [ElectorController::class, 'store'])->name('electores.store');
Route::get('/registro/success/{nombre}', [ElectorController::class, 'success'])->name('electores.success');
