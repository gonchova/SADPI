<?php

namespace App\Http\Controllers\Coordinador;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Actividades;
use App\Models\ActividadesFamilia;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    { User::select('users.*')->join('posts', 'posts.user_id', '=', 'users.id');
        
        $familias = User::where('idrol', 2)->orderby('name')->get();
        $actividadesFamilia = ActividadesFamilia::select('actividadesfamilia.idactividadfamilia', 'actividades.nombre','actividades.idactividad', 
                                                         'actividadesfamilia.cantdias','actividadesavances.cantdiasfinalizados')
        ->join('actividades', 'actividades.idactividad', '=', 'actividadesfamilia.idactividad')
        ->join('actividadesavances', 'actividadesavances.idactividadfamilia', '=', 'actividadesfamilia.idactividadfamilia')
        ->where('actividadesfamilia.idusuario',$familias[0]->id)->get();

                                                //->where('fecdesde','>=', Carbon::Now())

        return view("dashboard", compact('familias','actividadesFamilia'));

    }

    public function filtrar( $idfamilia, $fecdesde, $fechasta )
    { 
        if($fecdesde == null)
            $fecdesde = Carbon::Now();

        if($fechasta == null)
            $fechasta = Carbon::Now();

        $actividadesFamilia = ActividadesFamilia::select('actividadesfamilia.idactividadfamilia', 'actividades.nombre','actividades.idactividad',
                                                         'actividadesfamilia.cantdias','actividadesavances.cantdiasfinalizados')
            ->join('actividades', 'actividades.idactividad', '=', 'actividadesfamilia.idactividad')
            ->join('actividadesavances', 'actividadesavances.idactividadfamilia', '=', 'actividadesfamilia.idactividadfamilia') 
            ->where('actividadesfamilia.idusuario',$idfamilia)
            ->where('actividadesfamilia.fecdesde', '>=', $fecdesde)
            ->where('actividadesfamilia.fechasta', '<=', $fechasta)
            ->get();
    

        return $actividadesFamilia;

    }
}
