<?php

namespace App\Http\Controllers\Familias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class actividadesFamiliaPrincipalController extends Controller
{
    public function index()
    {
      return view('ActividadesFamilia.actividadesFamiliaPrincipal');
    }

    public function seleccionActividad()
    {
      return view('ActividadesFamilia.actividadFamilia');
    }
}
