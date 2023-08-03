<?php

namespace App\Http\Controllers\Familias;

use App\Models\Actividades;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JuegosPrincipalController extends Controller
{
    public function index()
    {
      $idfamilia= Auth()->User()->id;

      $juegos =  Actividades::where('tipoactividad', 'J')
              ->join('actividadesfamilia', 'actividadesfamilia.idactividad', '=', 'actividades.idactividad')
              ->where('actividadesfamilia.idusuario', '=',$idfamilia )
              ->where('actividadesfamilia.fecdesde', '<=', Carbon::Now() )
              ->where('actividadesfamilia.fechasta', '>=', Carbon::Now() )
              ->distinct('actividades.idactividad', 'actividadesfamilia.idactividadfamilia')
              ->select( 'actividadesfamilia.idactividadfamilia','actividades.idactividad','actividadesfamilia.fecdesde','actividadesfamilia.fechasta')->get();
      
      if (!$juegos)
      {
        return back()->withErrors('No tiene juegos habilitados'); 
      }

      return view('Juegos.juegosPrincipal', compact('juegos'));
    }
}
