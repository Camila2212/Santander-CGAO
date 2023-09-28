<?php

use App\Http\Controllers\CiudadController;
use App\Http\Controllers\MujerController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


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


require __DIR__.'/auth.php';
