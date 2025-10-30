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

Route::get('/register', [ElectorController::class, 'create'])->name('electores.create');
Route::post('/register', [ElectorController::class, 'store'])->name('electores.store');;
