<?php

namespace App\Http\Controllers\Familias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JuegoAnimalesController extends Controller
{
  public function index()
  {
    return view('Juegos.animales-IA');
  }
}
