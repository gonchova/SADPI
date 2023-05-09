<?php

namespace App\Http\Controllers\Coordinador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActividadesController extends Controller
{
    public function index()
    { 
        return view("actividades");

    }
}
