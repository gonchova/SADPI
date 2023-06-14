<?php

namespace App\Http\Controllers\Coordinador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Especialidades;

class EspecialidadesController extends Controller
{
    public function getEspecialidades()
    {
        $especialidades= Especialidades::where('activo', 1)->get(); 

        return $especialidades;
    }
}
