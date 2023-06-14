<?php

namespace App\Http\Controllers\Coordinador;

use App\Http\Controllers\Controller;
use App\Models\Especialidades;
use Illuminate\Http\Request;
use App\Models\Actividades;

class ActividadesController extends Controller
{
    public function index()
    {   
        $actividades = Actividades::buscar();
        $especialidades= Especialidades::all();
       
        return view("actividades.actividades", compact("actividades","especialidades"));

    }

    public function filtrar(Request $request)
    {   
        $valorActividad = $request->get('buscaActividad');
        $valorCategoria = $request->get('categoriasFiltro');

        $actividades = Actividades::buscar($valorActividad, $valorCategoria);//->paginate(10);
        $especialidades= Especialidades::all();
        
        return view("actividades.actividades",compact("actividades","especialidades")); 
    }

    public function nueva()
    { 
        return view("actividades.nuevaActividad");

    }

    public function editar()
    { 
        return view("actividades.editarActividad");

    }

    public function dashboard()
    { 
        return view("actividades.dashboard");

    }

    public function comentarios()
    { 
        return view("actividades.comentarios");

    }

    public function asignacionActividades()
    { 
        return view("actividades.asignacionActividades");

    }

}
