<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Coordinador\ActividadesController;
use App\Http\Controllers\Coordinador\AsignacionActividadesController;
use App\Http\Controllers\Coordinador\DashboardController;
use App\Http\Controllers\Coordinador\NuevoUsuarioController;
use App\Http\Controllers\Coordinador\EspecialidadesController;
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
Route::get('/dashboard/filtrar/{idfamilia}/{fecdesde}/{fechasta}/{categoria}', [DashboardController::class,'filtrar'])->middleware(['auth'])->name('dashboard.filtrar');

Route::get('/actividades/asignacion', [ActividadesController::class,'asignacionActividades'])->middleware(['auth'])->name('actividades.asignacion');
Route::post('/actividades/asignacion/nueva',[AsignacionActividadesController::class,'save'])->middleware(['auth'])->name('asignacionActividades.save');
Route::get('/actividades/asignacion/filtrar',[AsignacionActividadesController::class,'filtrar'])->middleware(['auth'])->name('asignacionActividades.filtrar');
Route::get('/actividades/nueva', [ActividadesController::class,'nueva'])->middleware(['auth'])->name('actividades.nueva');
Route::post('/actividades/nueva',[ActividadesController::class,'save'])->middleware(['auth'])->name('actividades.save');
Route::delete('/actividades/eliminar/{id}/{confirmaeliminacion}',[ActividadesController::class,'eliminar'])->middleware(['auth'])->name('actividades.eliminar');
Route::get('/actividades', [ActividadesController::class,'index'])->middleware(['auth'])->name('actividades');
Route::get('/actividades/filtrar', [ActividadesController::class,'filtrar'])->middleware(['auth'])->name('actividades.filtrar');
Route::get('/actividades/editar/{idactividad}', [ActividadesController::class,'editar'])->middleware(['auth'])->name('actividades.editar');
Route::put('/actividades/editar/{idactividad}', [ActividadesController::class,'update'])->middleware(['auth'])->name('actividades.update');

Route::get('/actividades/comentario/{idactividadfamilia}', [ActividadesController::class,'comentarios'])->middleware(['auth'])->name('actividades.comentarios');
Route::get('/actividades/realizado/{idfamilia}/{fecdesde}/{fechasta}', [ActividadesController::class,'obtenerRealizado'])->middleware(['auth'])->name('actividades.obtenerRealizado');

Route::get('/getEspecialidades', [EspecialidadesController::class,'getEspecialidades'])->middleware(['auth'])->name('getEspecialidades');


/* rutas familias */
Route::get('/animalesIA/{idactividadfamilia}', [JuegoAnimalesController::class,'index'])->middleware(['auth'])->name('animalesIA');
Route::post('/animalesIA/save/{idactividadfamilia}/{idfamilia}', [JuegoAnimalesController::class,'save'])->middleware(['auth'])->name('saveAnimales');

Route::get('/colocarFicha/{idactividadfamilia}', [JuegoFichasController::class,'index'])->middleware(['auth'])->name('colocarFicha');
Route::post('/colocarFicha/save/{idactividadfamilia}/{idfamilia}', [JuegoFichasController::class,'save'])->middleware(['auth'])->name('saveFichas');


Route::get('/Juegos', [JuegosPrincipalController::class,'index'])->middleware(['auth'])->name('juegos');

Route::get('/actividadesFamilia/principal', [actividadesFamiliaPrincipalController::class,'index'])->middleware(['auth'])->name('actividadesFamilia.principal');
Route::get('/actividadesFamilia/actividadFamilia/{idactividadfamilia}', [actividadesFamiliaPrincipalController::class,'seleccionActividad'])->middleware(['auth'])->name('actividadesFamilia.actividadFamilia');
Route::post('/actividadesFamilia/actividadFamilia/{idactividadfamilia}', [actividadesFamiliaPrincipalController::class,'save'])->middleware(['auth'])->name('actividadesFamilia.save');

    
require __DIR__.'/auth.php';

// require '../vendor/autoload.php';

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
	$exitCode = Artisan::call('optimize:clear');
    return 'DONE'; //Return anything
});

// Route::get('/updateapp', function()
// {
//     Artisan::call('composer dump-autoload');
//     echo 'dump-autoload complete';
// });