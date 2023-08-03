<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Coordinador\ActividadesController;
use App\Http\Controllers\Coordinador\DashboardController;
use App\Http\Controllers\Coordinador\NuevoUsuarioController;
use App\Http\Controllers\Familias\JuegosPrincipalController;
use App\Http\Controllers\Familias\JuegoAnimalesController;
use App\Http\Controllers\Familias\JuegoFichasController;
use App\Http\Controllers\Familias\actividadesFamiliaPrincipalController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/actividades/asignacion', [ActividadesController::class,'asignacionActividades'])->middleware(['auth'])->name('actividades.asignacion');
Route::get('/actividades/nueva', [ActividadesController::class,'nueva'])->middleware(['auth'])->name('actividades.nueva');
Route::get('/actividades', [ActividadesController::class,'index'])->middleware(['auth'])->name('actividades');
Route::get('/actividades/filtrar', [ActividadesController::class,'filtrar'])->middleware(['auth'])->name('actividades.filtrar');
Route::get('/actividades/editar', [ActividadesController::class,'editar'])->middleware(['auth'])->name('actividades.editar');
//Route::get('/actividades/dashboard', [ActividadesController::class,'dashboard'])->middleware(['auth'])->name('actividades.dashboard');
Route::get('/actividades/comentarios', [ActividadesController::class,'comentarios'])->middleware(['auth'])->name('actividades.comentarios');

/* rutas familias */
Route::get('/animalesIA', [JuegoAnimalesController::class,'index'])->middleware(['auth'])->name('animalesIA');
Route::get('/colocarFicha', [JuegoFichasController::class,'index'])->middleware(['auth'])->name('colocarFicha');
Route::get('/colocarFicha/{idactividadfamilia}', [JuegoFichasController::class,'index'])->middleware(['auth'])->name('colocarFicha');

Route::get('/Juegos', [JuegosPrincipalController::class,'index'])->middleware(['auth'])->name('juegos');

Route::get('/actividadesFamilia/principal', [actividadesFamiliaPrincipalController::class,'index'])->middleware(['auth'])->name('actividadesFamilia.principal');
Route::get('/actividadesFamilia/actividadFamilia', [actividadesFamiliaPrincipalController::class,'seleccionActividad'])->middleware(['auth'])->name('actividadesFamilia.actividadFamilia');
    
require __DIR__.'/auth.php';


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
	$exitCode = Artisan::call('optimize:clear');
    return 'DONE'; //Return anything
});
