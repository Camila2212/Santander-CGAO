<?php

use App\Http\Controllers\MujerController;
use App\Http\Controllers\ProfileController;
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

Route::post('ingresarMujer',[MujerController::class,"create"])->name('mujer.create');


//ruta para modificar una mujer
Route::post('modificarMujer',[MujerController::class,'update'])->name('mujer.update');

//ruta para eliminar una mujer
Route::get('deleteMujer-{id}', [MujerController::class, 'delete'])->name('mujer.delete');



require __DIR__.'/auth.php';
