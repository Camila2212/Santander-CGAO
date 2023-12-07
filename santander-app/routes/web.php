<?php

use App\Http\Controllers\CiudadController;
use App\Http\Controllers\DisponibilidadController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\ManzanaController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MujerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TServicioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Ruta para acceder a la vista de actualidad
Route::get('actualidad', function () {
    return view('actualidad');
});

//Ruta para acceder a los buses del cuidado
Route::get('busDelCuidado',function(){
    return view('busDelCuidado');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//ruta acceder al mapa
Route::get('/map', [MapController::class, 'index'])->name('map.index');


//Ruta para acceder a la pagina mujer
Route::get('mujer',[MujerController::class,"index"])->name('mujer.index');
//ruta para ingresar una mujer
Route::post('ingresarMujer',[MujerController::class,"create"])->name('mujer.create');

//ruta para modificar una mujer
Route::post('modificarMujer',[MujerController::class,'update'])->name('mujer.update');

//ruta para eliminar una mujer
Route::get('deleteMujer-{id}', [MujerController::class, 'delete'])->name('mujer.delete');



//Ruta para acceder a la pagina ciudad
Route::get('ciudad',[CiudadController::class,"index"])->name('ciudad.index');
//ruta para ingresar una ciudad
Route::post('ingresarCiudad',[CiudadController::class,"create"])->name('ciudad.create');

//ruta para modificar una ciudad
Route::post('modificarCiudad',[CiudadController::class,'update'])->name('ciudad.update');

//ruta para eliminar una ciudad
Route::get('deleteCiudad-{id}', [CiudadController::class, 'delete'])->name('ciudad.delete');



//Ruta para acceder a tipos de servicios
Route::get('tipoServicio',[TServicioController::class,"index"])->name('tservicio.index');
//ruta para ingresar un tipo de servicio
Route::post('ingresartipoServicio',[TServicioController::class,"create"])->name('tservicio.create');

//ruta para modificar tipo de servicio
Route::post('modificartipoServicio',[TServicioController::class,'update'])->name('tservicio.update');

//ruta para eliminar tipo de servicio
Route::get('deletetipoServicio-{id}', [TServicioController::class, 'delete'])->name('tservicio.delete');



//Ruta para acceder a servicios
Route::get('Servicio',[ServicioController::class,"index"])->name('servicio.index');
//ruta para ingresar un servicio
Route::post('ingresarServicio',[ServicioController::class,"create"])->name('servicio.create');

//ruta para modificar servicio
Route::post('modificarServicio',[ServicioController::class,'update'])->name('servicio.update');

//ruta para eliminar servicio
Route::get('deleteServicio-{id}', [ServicioController::class, 'delete'])->name('servicio.delete');



//Ruta para acceder a establecimiento
Route::get('establecimiento',[EstablecimientoController::class,"index"])->name('establecimiento.index');
//ruta para ingresar un establecimiento
Route::post('ingresarEstablecimiento',[EstablecimientoController::class,"create"])->name('establecimiento.create');

//ruta para modificar establecimiento
Route::post('modificarEstablecimiento',[EstablecimientoController::class,'update'])->name('establecimiento.update');

//ruta para eliminar establecimiento
Route::get('deleteEstablecimiento-{id}', [EstablecimientoController::class, 'delete'])->name('establecimiento.delete');




//Ruta para acceder a manzana
Route::get('manzana',[ManzanaController::class,"index"])->name('manzana.index');

//ruta para ingresar una manzana
Route::post('ingresarManzana',[ManzanaController::class,"create"])->name('manzana.create');

//ruta para modificar una manzana
Route::post('modificarManzana',[ManzanaController::class,'update'])->name('manzana.update');

//ruta para eliminar una manzana
Route::get('deleteManzana-{id}', [ManzanaController::class, 'delete'])->name('manzana.delete');



//Ruta para acceder a una disponibilidad
Route::get('propuesta',[DisponibilidadController::class,"index"])->name('propuesta.index');
//ruta para ingresar una disponibilidad
Route::post('ingresarPropuesta',[DisponibilidadController::class,"create"])->name('propuesta.create');

//ruta para modificar una disponibilidad
Route::post('modificarPropuesta',[DisponibilidadController::class,'update'])->name('propuesta.update');

//ruta para eliminar una disponibilidad
Route::get('deletePropuesta-{id}', [DisponibilidadController::class, 'delete'])->name('propuesta.delete');

require __DIR__.'/auth.php';
