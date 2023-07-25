<?php

namespace App\Http\Controllers\Familias;

use App\Http\Controllers\Controller;
use App\Models\ActividadComentario;
use App\Models\Actividades;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\ActividadesFamilia;
use App\Models\PasosActividad;
use App\Models\ActividadesAvances;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;

class actividadesFamiliaPrincipalController extends Controller
{
    public function index()
    {
      $idUsuario = Auth::user()->id;

      $actividadesFlia = ActividadesFamilia::where('idusuario', $idUsuario)->get();
        // ->where('fecdesde','<=', Carbon::now())
        // ->where('fechasta','>=', Carbon::now());
      //dd($actividadesFlia[0]->actividades->nombre);
      
      return view('actividadesFamilia.actividadesFamiliaPrincipal', compact('actividadesFlia'));
    }

    public function seleccionActividad($idactividadfamilia)
    { 
      if(!$idactividadfamilia)
        return back()->withErrors('Actividad no encontrada');

      $actividadFamilia= ActividadesFamilia::where('idactividadfamilia', $idactividadfamilia)->first();
      $pasosActividad = PasosActividad::where('idactividad', $actividadFamilia->idactividad)->get();

      return view('actividadesFamilia.actividadFamilia', compact('actividadFamilia','pasosActividad','idactividadfamilia'));
    }

    public function save(Request $request, string $idactividadfamilia)
    {
        $observaciones = $request->get('observaciones');
        // $idUsuario = Auth::user()->id;

        if(!$idactividadfamilia)
          return back()->withErrors('Actividad no encontrada, no se actualizan los datos'); 
        // $rules = ['idactividad' => 'required'];
        // $messages = ['idactividad.required' => 'no se pudo obtener un id de actividad' ];

        // $this->validate($request, $rules, $messages);

        //verifico si no grabo hoy una activadad realizada
        $actividadAvance = ActividadesAvances::where('idactividadfamilia',$idactividadfamilia)
            ->first();

        if ($actividadAvance)
        { 
            
          //si existen avances, verifico la fecha
          if ($actividadAvance->count()>0)
          { 
            if($actividadAvance->ultimodiarealizada == Carbon::now()->format('Y-m-d') )
            { 
              return back()->withErrors('La Actividad del día ya fue realizada.'); 
            }

            $actividadesFlia = ActividadesFamilia::find($idactividadfamilia);

            if ($actividadAvance->cantdiasfinalizados >= $actividadesFlia->cantdias)
            {
                return back()->withErrors("Ya se han realizado todas las actividades.\n Puede continuar sin confirmar la realización.");
            }

            $actividadAvance->ultimodiarealizada = Carbon::now();
            $actividadAvance->cantdiasfinalizados += 1;
            $actividadAvance->estado = 'A'; //Activa
            $actividadAvance->save();
            
          }
        }
        else  
        {
          //puede grabar nueva actividad
          $actividadAvance = ActividadesAvances::create([
            'idactividadfamilia' => $idactividadfamilia,
            'cantdiasfinalizados' => 1,
            'ultimodiarealizada' => Carbon::now(),
            'estado' => 'N' //Nueva
          ]
          );

          if(!$actividadAvance)
            return back()->withErrors('Error al crear avance de actividad.'); 
        }

      if($observaciones != "")  
      {
        $actividadComentario = ActividadComentario::create([
          'idactividadfamilia' => $idactividadfamilia,
          'idnumerodia' => $actividadAvance->cantdiasfinalizados,
          'comentario' => $observaciones,
          'fecha' => Carbon::now(),
          ]);

      }

      return back()->with('mensaje', 'Actividad del dia realizada!');
    }



}//fin clase
