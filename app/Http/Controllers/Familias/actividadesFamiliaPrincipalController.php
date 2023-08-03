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

      $actividadesFlia = ActividadesFamilia::where('idusuario', $idUsuario)
        ->where('fecdesde','<=', Carbon::now())
        ->where('fechasta','>=', Carbon::now())
        ->orderBy('fecdesde', 'ASC')->orderBy('fechasta', 'ASC')
        ->get();
              
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

        if(!$idactividadfamilia)
          return back()->withErrors('Actividad no encontrada, no se actualizan los datos'); 

        // $this->validate($request, $rules, $messages);
        $actividadesFlia = ActividadesFamilia::find($idactividadfamilia);

        //verifico si no grabo hoy una activadad realizada
        $actividadAvance = ActividadesAvances::where('idactividadfamilia',$idactividadfamilia)->first();

        if ($actividadAvance)
        { 
            
          //si existen avances, verifico la fecha
          if ($actividadAvance->count()>0)
          { 
            if($actividadAvance->ultimodiarealizada == Carbon::now()->format('Y-m-d') )
            { 
            
              if($actividadAvance->estado == 'F') // Dia completado
              {
                  return back()->withErrors("Ya se han realizado todas los intentos del día.". "\n" . "Puede continuar sin confirmar la realización.");
              }
            }

            $actividadAvance->ultimodiarealizada = Carbon::now();
            $actividadAvance->cantintentosdiafinalizados +=1;
            $actividadAvance->estado = 'A'; //Activa  Nuevo dia
            $msgCantRealizado = $actividadAvance->cantintentosdiafinalizados;

            if($actividadAvance->cantintentosdiafinalizados == $actividadesFlia->cantdia)
            { 
              $actividadAvance->cantintentosdiafinalizados = 0;
              $actividadAvance->cantdiasfinalizados += 1;
              $actividadAvance->estado = 'F'; // Dia completado
              
            }
            
            $actividadAvance->save();

          }
        }
        else  
        { 
          $cantdiasfinalizados=0;
          $estado = 'N';
          
          $msgCantRealizado = 1;

          if($actividadesFlia->cantdia == 1 )
          {
            $cantdiasfinalizados=1;
            $estado = 'F';
            
          }

          //puede grabar nueva actividad avance
          $actividadAvance = ActividadesAvances::create([
            'idactividadfamilia' => $idactividadfamilia,
            'cantdiasfinalizados' => $cantdiasfinalizados,
            'cantintentosdiafinalizados' => 1,
            'ultimodiarealizada' => Carbon::now(),
            'estado' => $estado 
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
      
    return back()->with('mensaje', 'Actividad del dia realizada! (' . $msgCantRealizado  . ' de ' . $actividadesFlia->cantdia . ')');
    }



}//fin clase
