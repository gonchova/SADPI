<?php

namespace App\Http\Controllers\Familias;

use App\Http\Controllers\Controller;
use App\Models\ActividadesFamilia;
use App\Models\ActividadesAvances;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JuegoFichasController extends Controller
{
    public function index($idactividadfamilia)
    { 

      $actividadfamilia =  ActividadesFamilia::where('idactividadfamilia', $idactividadfamilia)->get();
      
      if (!$actividadfamilia)
      {
        return back()->withErrors('El juego Colocar fichas no esta habilitado'); 
      }

      return view('Juegos.colocarFicha', compact('actividadfamilia'));
    
    }

   

    public function save( string $idactividadfamilia, string $idfamilia)
    {
        $data['status'] = true;

        if(!$idactividadfamilia)
          {
            $data['status'] = false; 
            $data['message'] ='Error al crear avance de actividad.'; 
          }
        
        if(!$idfamilia)
          {
            $data['status'] = false; 
            $data['message'] ='Error al crear avance de actividad.'; 
          }
      
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
                $data['status'] = true; 
                $data['message'] ='Actividades del día completadas, puede continuar jugando.'; 
                return $data;
              }
            }

            $actividadAvance->ultimodiarealizada = Carbon::now();
            $actividadAvance->cantintentosdiafinalizados +=1;
            $actividadAvance->estado = 'A'; //Activa  Nuevo dia
            $msgCantRealizado = $actividadAvance->cantintentosdiafinalizados;

            //verifico si el avance actual es el ultimo, finalizo el dia  
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
            {
              $data['status'] = false; 
              $data['message'] ='Error al crear avance de actividad.'; 
            }
        }
      
      if(!isset($data['message']))
      {
        if ($msgCantRealizado == $actividadesFlia->cantdia)
          $data['message'] = 'Intento '. $msgCantRealizado . ' de ' . $actividadesFlia->cantdia;
        else
          $data['message'] = 'Actividades del día completadas, puede continuar jugando.';
      }


      return $data;
     }

}
