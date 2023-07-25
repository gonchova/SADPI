<?php

namespace App\Http\Controllers\Coordinador;
use App\Models\Actividades;
use App\Models\ActividadesFamilia;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignacionActividadesController extends Controller
{   
    public function filtrar(Request $request)
    {   
        $valorActividad = $request->get('filtroActividad');

        $actividades = Actividades::buscar($valorActividad);
        
        $familias = User::where('idrol', 2)->get();

        return view("actividades.asignacionActividades", compact('familias','actividades'));
    }

    public function save(Request $request)
    {    
        $dataReturn=[];
        $data=[];
        $bindings=[];
        $mensaje="";
        
        $ActividadesSel = $request->get('itemSel');
        $fecDesde = $request->get('fecDesde');
        $fecHasta = $request->get('fecHasta');
        $idUsuario = $request->input('idFamilia');

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
            if(!$act['cantidad'])
            {  
               $dataReturn['status'] = false;
               $dataReturn['message'] = 'Debe ingresar cantidad válida en todas las actividades seleccionadas';
               array_push($data,$dataReturn);
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
        
            foreach($ActividadesSel as $actflia)
            {   
                $actividadflia = new ActividadesFamilia();

                $actividadflia->idusuario = $idUsuario;
                $actividadflia->idactividad = $actflia['idactividad'];
                $actividadflia->fecdesde = $fecDesde;
                $actividadflia->fechasta = $fecHasta;
                $actividadflia->cantdias = $actflia['cantidad'];

                // DB::transaction(function () use ($actividadflia)                 { 
                $actividadflia->save();
                $actflia=null;
                // });
                
            }
        
        
            $dataReturn['status'] = true;
            $dataReturn['message'] = 'Actividades asignadas correctamente!';
            array_push($data,$dataReturn);
        }   




        return  $data;

    }

}
