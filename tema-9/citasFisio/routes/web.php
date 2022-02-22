<?php

use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/dashboard')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [CitaController::class, 'index'])->name('dashboard');
        Route::get('/citas/delete/{cita}', [CitaController::class, 'destroy']);

        //Rutas asociadas al controlador resource CitaController
        //GET 	/citas 	index 	citas.index
        //GET 	/citas/create 	create 	citas.create
        //POST 	/citas 	store 	citas.store
        //GET 	/citas/{cita} 	show 	citas.show
        //GET 	/citas/{cita}/edit 	edit 	citas.edit
        //PUT/PATCH 	/citas/{cita} 	update 	citas.update
        //DELETE 	/citas/{cita} 	destroy 	citas.destroy
        Route::resource('citas', CitaController::class);

        //Ver horas libres en una fecha, para poder dar una cita
        Route::get('/citas/horasDisp/{fecha}', [CitaController::class, 'horasDisp']);
    });

    //servicios
    Route::middleware(['auth'])->group(function () {
        Route::get('/servicios', [ServicioController::class, 'index'])->name('dashboard.servicios');
        Route::get('/servicios/delete/{id}', [ServicioController::class, 'destroy']);
        Route::get('/servicios/create', [ServicioController::class, 'create']);
        Route::post('/servicios', [ServicioController::class, 'store'])->name('servicios.store');
        Route::resource('servicios', ServicioController::class);
    });
});

require __DIR__ . '/auth.php';
