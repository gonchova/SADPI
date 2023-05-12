<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Coordinador\ActividadesController;
use App\Http\Controllers\Coordinador\DashboardController;
use App\Http\Controllers\Coordinador\NuevoUsuarioController;
use App\Http\Controllers\Familias\JuegosPrincipalController;
use App\Http\Controllers\Familias\JuegoAnimalesController;


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

// Route::get('/login', function () {
//     return view('auth.login');
// })->middleware(['auth'])->name('login');

// Route::get('/', function () {
//     return view('auth.login');
// })->middleware(['auth'])->name('login');

Route::get('/', function () {
    return view('principal');
})->middleware(['auth'])->name('principal');




Route::get('/nuevousuario', [NuevoUsuarioController::class,'index'])->middleware(['auth'])->name('nuevousuario');
Route::post('/nuevousuario', [NuevoUsuarioController::class,'store'])->middleware(['auth']);

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::get('/actividades', [ActividadesController::class,'index'])->middleware(['auth'])->name('actividades');
Route::get('/actividades/nueva', [ActividadesController::class,'nueva'])->middleware(['auth'])->name('actividades.nueva');
 
/* rutas familias */
Route::get('/animalesIA', [JuegoAnimalesController::class,'index'])->middleware(['auth'])->name('animalesIA');

Route::get('/Juegos', [JuegosPrincipalController::class,'index'])->middleware(['auth'])->name('juegos');
    
require __DIR__.'/auth.php';

