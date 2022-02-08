<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidenciaController;

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

Route::get('/incidencias/{incidencia}', [IncidenciaController::class, 'destroy']);

//Meteria todas las rutas asociadas al controlador resource
Route::resource('/incidencias', IncidenciaController::class);
