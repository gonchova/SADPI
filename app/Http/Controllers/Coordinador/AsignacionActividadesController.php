<?php

namespace App\Http\Controllers\Coordinador;
use App\Models\Actividades;
use App\Models\ActividadesFamilia;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\ActividadesAvances;
use App\Models\ActividadComentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionActividadesController extends Controller
{   
    public function filtrar(Request $request)
    {   
        $valorActividad = $request->get('filtroActividad');

        $actividades = Actividades::buscar($valorActividad, null, null);
        
        $familias = User::where('idrol', 2)->get();

        return view("actividades.asignacionActividades", compact('familias','actividades'));
    }

    public function save(Request $request)
    {    
        $dataReturn=[];
        $data=[];
        $bindings=[];
        $mensaje="";
        $verificar= true;

        $ActividadesSel = $request->get('itemSel');
        $fecDesde = $request->get('fecDesde');
        $fecHasta = $request->get('fecHasta');
        $idUsuario = $request->input('idFamilia');

        if (!$idUsuario) 
        { 
            $dataReturn['status'] = false;
            $dataReturn['message'] = 'Debe seleccionar una familia';
            array_push($data,$dataReturn);
        }

        if (!$ActividadesSel) 
        { 
            $dataReturn['status'] = false;
            $dataReturn['message'] = 'Debe seleccionar al menos una actividad';
            array_push($data,$dataReturn);
        }

        if (!($fecDesde && $fecHasta)) 
        {   
            $dataReturn['status'] = false;
            $dataReturn['message'] = 'Debe ingresar rango de fechas válido';
            array_push($data,$dataReturn);
        }
        
        foreach($ActividadesSel as $act )
        {   
            if(!$act['cantidad'] && $verificar)
            {  
               $dataReturn['status'] = false;
               $dataReturn['message'] = 'Debe ingresar cantidad válida en todas las actividades seleccionadas';
               array_push($data,$dataReturn);
               $verificar=false;
            }


            //Verifica si la familia ya tiene asignadas actividades dentro del rango seleccionado
            $sql = "SELECT a.idactividad, b.nombre, a.fecdesde, a.fechasta
            FROM ActividadesFamilia a
            INNER JOIN Actividades b ON a.idActividad = b.idActividad
            WHERE a.idUsuario = ?
            AND a.idActividad = ?
            AND ((a.fecdesde <= ? AND a.fechasta >= ?) 
            OR (a.fecdesde <= ? AND a.fechasta >= ?)
            OR (a.fecdesde >= ? AND a.fechasta <= ?))";

            array_push($bindings, $idUsuario);  
            array_push($bindings, $act['idactividad']);  
            array_push($bindings, $fecDesde);   
            array_push($bindings, $fecDesde);   
            array_push($bindings, $fecHasta);   
            array_push($bindings, $fecHasta);   
            array_push($bindings, $fecDesde);   
            array_push($bindings, $fecHasta);   

            $actividadSolapada = DB::select($sql,$bindings);

            if($actividadSolapada)
            {
                $dataReturn['status'] = false;
            
                $mensaje =  'Las fechas seleccionadas se solapan con las siguientes actividades asignadas previamente: ' ;

                foreach(collect($actividadSolapada) as $actSolapada)
                {
                    $mensaje.= "\r\n" . $actSolapada->nombre . " = (" . date('d-m-Y', strtotime($actSolapada->fecdesde)). " al " . date('d-m-Y', strtotime($actSolapada->fechasta)) . "), "."\r\n";
                
                }

                $dataReturn['message'] = $mensaje;
                array_push($data,$dataReturn);
            }
            $actividadSolapada=null;
            $bindings=[];
        }
        


        //Si no hay errores, realiza insercion
        if(!$data)
        {
            DB::transaction(function () use ($idUsuario,$ActividadesSel,$fecDesde,$fecHasta)
            {
                foreach($ActividadesSel as $actflia)
                {   
                    $actividadflia = new ActividadesFamilia();

                    $actividadflia->idusuario = $idUsuario;
                    $actividadflia->idactividad = $actflia['idactividad'];
                    $actividadflia->fecdesde = $fecDesde;
                    $actividadflia->fechasta = $fecHasta;
                    $actividadflia->cantdia = $actflia['cantidad'];

                    $actividadflia->save();
                    $actflia=null;

                    
                }
            });
        
            $dataReturn['status'] = true;
            $dataReturn['message'] = 'Actividades asignadas correctamente!';
            array_push($data,$dataReturn);
        }   

        return  $data;

    }

    public function eliminar( string $idactividadfamilia)
    {   
        $dataReturn=[];
        $data=[];
  
        if(!$idactividadfamilia)
          {
            $dataReturn['status'] = false; 
            $dataReturn['message'] ='Error al crear avance de juego.'; 
            array_push($data,$dataReturn);

            return $data;
          }
        
        DB::transaction(function () use ($idactividadfamilia,$data,$dataReturn)
        {
           $actividadesAvancesFlia = ActividadesAvances::find($idactividadfamilia);
           $actividadesAvancesFlia->delete();

           $actividadesComentariosFlia = ActividadComentario::where('idactividadfamilia', $idactividadfamilia);
           $actividadesComentariosFlia->delete();
            
        });
        
        $dataReturn['status'] = true;
        $dataReturn['message'] = 'Avances de actividad eliminados correctamente.';
        array_push($data,$dataReturn);

         return $data;
    }
}
