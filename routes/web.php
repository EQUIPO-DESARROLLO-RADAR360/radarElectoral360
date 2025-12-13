<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Electores\ElectorController;
use App\Http\Controllers\Ciudadanos\CiudadanosController;
use App\Http\Controllers\EventoController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Gestión
Route::prefix('gestion')->name('gestion.')->group(function () {
    Route::get('/', function () {
        return view('gestion.index');
    })->name('index');
});

// Encuestas
Route::prefix('encuestas')->name('encuestas.')->group(function () {
    Route::get('/', function () {
        return view('encuestas.index');
    })->name('index');
});

// Comunicación
Route::prefix('comunicacion')->name('comunicacion.')->group(function () {
    Route::get('/', function () {
        return view('comunicacion.index');
    })->name('index');
});

// Electoral
Route::prefix('electoral')->name('electoral.')->group(function () {
    Route::get('/', function () {
        return view('electoral.index');
    })->name('index');
});

// Eventos - Resource Controller
Route::get('/eventos/data', [EventoController::class, 'getData'])->name('eventos.data');
Route::resource('eventos', EventoController::class);

// Configuración
Route::prefix('configuracion')->name('configuracion.')->group(function () {
    Route::get('/', function () {
        return view('configuracion.index');
    })->name('index');
});

//---------------Rutas generales-------------------
// Ruta para verificar si el DNI ya está registrado
Route::get('/verificar-dni/{dni}', [ElectorController::class, 'verificarDni']);
// Ruta para delvolver el registro encontrado
Route::get('/registro/encontrado/{dni}', [ElectorController::class, 'encontrado'])->name('elector.encontrado');


//---------------Registro de rifas----------------
Route::get('/registro', [ElectorController::class, 'create'])->name('elector.create');
//---------------Guardar rifas--------------------
Route::post('/registro', [ElectorController::class, 'store'])->name('elector.store');
//---------------Guardado exitosamente------------
Route::get('/registro/success/{nombre}/{ticked}', [ElectorController::class, 'success'])->name('elector.success');


//---------------Registro general----------------
Route::get('/ciudadano', [ElectorController::class, 'create'])->name('ciudadano.create');
//---------------Guardar registro----------------
Route::post('/ciudadano', [ElectorController::class, 'store'])->name('ciudadano.store');
//---------------Guardado exitosamente-----------
Route::get('/ciudadano/success/{nombre}/{ticked}', [ElectorController::class, 'success'])->name('ciudadano.success');


//---------------Registro de afiliados-----------
Route::get('/afiliado', [ElectorController::class, 'create'])->name('afiliado.create');
//---------------Guardar registro----------------
Route::post('/afiliado', [ElectorController::class, 'store'])->name('afiliado.store');
//---------------Guardado exitosamente-----------
Route::get('/afiliado/success/{nombre}/{ticked}', [ElectorController::class, 'success'])->name('afiliado.success');