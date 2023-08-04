<?php

namespace App\Http\Controllers\Coordinador;

use App\Http\Controllers\Controller;
use App\Models\ActividadComentario;
use App\Models\User;
use App\Models\Actividades;
use App\Models\ActividadesFamilia;
use App\Models\Especialidades;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    { 
        $especialidades= Especialidades::all();

        $familias = User::where('idrol', 2)->orderby('name')->get();
        $actividadesFamilia = ActividadesFamilia::select('actividadesfamilia.idactividadfamilia', 'actividades.nombre','actividades.idactividad', 
                                                         'actividadesfamilia.cantdia','actividadesavances.cantdiasfinalizados',
                                                         'actividadesfamilia.fecdesde', 'actividadesfamilia.fechasta')
        ->join('actividades', 'actividades.idactividad', '=', 'actividadesfamilia.idactividad')
        ->join('actividadesavances', 'actividadesavances.idactividadfamilia', '=', 'actividadesfamilia.idactividadfamilia')
        ->where('actividadesfamilia.idusuario',$familias[0]->id)
        ->orderBy('actividadesfamilia.fecdesde', 'ASC')
        ->orderby('actividadesfamilia.fechasta', 'ASC')
        ->get();

                                                //->where('fecdesde','>=', Carbon::Now())

        return view("dashboard", compact('familias','actividadesFamilia','especialidades'));

    }

    public function filtrar( $idfamilia, $fecdesde, $fechasta, $categoria )
    { 
        if($fecdesde == null)
            $fecdesde = Carbon::Now();

        if($fechasta == null)
            $fechasta = Carbon::Now();

        $actividadesFamilia = ActividadesFamilia::select('actividadesfamilia.idactividadfamilia', 'actividades.nombre','actividades.idactividad',
                                                         'actividadesfamilia.cantdia','actividadesavances.cantdiasfinalizados', 
                                                         'actividadesfamilia.fecdesde', 'actividadesfamilia.fechasta',
                                                          DB::raw('count(actividadcomentario.idactividadfamilia) as cantcomentarios'))
            ->join('actividades', 'actividades.idactividad', '=', 'actividadesfamilia.idactividad')
            ->leftjoin('actividadesavances', 'actividadesavances.idactividadfamilia', '=', 'actividadesfamilia.idactividadfamilia') 
            ->leftjoin('actividadcomentario', 'actividadcomentario.idactividadfamilia', '=', 'actividadesfamilia.idactividadfamilia') 
            ->where('actividadesfamilia.idusuario',$idfamilia)
            ->where('actividadesfamilia.fecdesde', '>=', $fecdesde)
            ->where('actividadesfamilia.fechasta', '<=', $fechasta)

            ->where(function($query) use($categoria) {
                if($categoria != "0")
                { $query->where('actividades.idespecialidad', $categoria); }

                }
            )
            ->groupBy('actividadesfamilia.idactividadfamilia', 'actividades.nombre','actividades.idactividad',
            'actividadesfamilia.cantdia','actividadesavances.cantdiasfinalizados', 
            'actividadesfamilia.fecdesde', 'actividadesfamilia.fechasta')
            ->orderBy('actividadesfamilia.fecdesde', 'ASC')
            ->orderby('actividadesfamilia.fechasta', 'ASC')
            ->get();

        return $actividadesFamilia;

    }
}
