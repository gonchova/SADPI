<?php

namespace App\Http\Controllers\Coordinador;

use App\Http\Controllers\Controller;
use App\Models\Especialidades;
use Illuminate\Http\Request;

use App\Models\Actividades;
use App\Models\ActividadComentario;
use App\Models\ActividadesAvances;
use App\Models\ActividadesFamilia;
use App\Models\IntentosJuego;
use App\Models\PasosActividad;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;


class ActividadesController extends Controller
{
    public function index()
    {   
        $actividades = Actividades::buscar(null,null, 'A');
        $especialidades= Especialidades::all();
        
        return view("actividades.actividades", compact("actividades","especialidades"));

    }

    public function filtrar(Request $request)
    {   
        $valorActividad = $request->get('buscaActividad');
        $valorCategoria = $request->get('categoriasFiltro');

        $actividades = Actividades::buscar($valorActividad, $valorCategoria, 'A');
        $especialidades= Especialidades::all();
        
        return view("actividades.actividades",compact("actividades","especialidades")); 
    }

    public function nueva()
    {   
        $especialidades= Especialidades::all();
        return view("actividades.nuevaActividad",compact("especialidades"));

    }

    public function editar($idActividad)
    { 
        $actividad = Actividades::find($idActividad);
        
        return view("actividades.editarActividad", compact('actividad'));

    }

    public function eliminar(Request $request, $idactividad, $confirmaEliminacion = "false")
    {  
        if(isset($_POST['CancelaEliminar']))
        {
            return back()->with(['status' => '', 
            'idactividad' => ''
            ]);
        }

        //valido si la actividad no esta activa para alguna familia
        $actividadVigente = ActividadesFamilia::where('idactividad', $idactividad)
                                    //->where('fecdesde','<=', Carbon::now())
                                    //->where('fechasta','>=', Carbon::now())
                                    ->first();

        if($actividadVigente && $confirmaEliminacion=="false")
        {
            if($actividadVigente->fecdesde <= Carbon::now()->format('Y-m-d') && $actividadVigente->fechasta>=Carbon::now()->format('Y-m-d'))
            {
                return back()->withErrors('Existen familias con la actividad vigente. No se puede eliminar');
            }
            else
            {   
                return back()->with(['status' => 'Existen familias con historial de realizacion de la actividad.'. "\n" . '¿Desea eliminar la actividad y el historial?', 
                                     'idactividad' => $idactividad
                                       ]);
            }

        } 

        if (!$actividadVigente || ($actividadVigente && $confirmaEliminacion == "true"))
        {
            $actividad  = Actividades::find($idactividad);
            
            if($confirmaEliminacion == "true")
            {
                $actividad->actividadesfamilia()->delete();
            }

            $actividad->pasosactividad()->delete();
            $actividad->delete();
        }

        return back()->with(['status' => '', 
                            'idactividad' => ''
                            ]);;

    }


    public function comentarios($idactividadfamilia)
    {  
        $comentarios = Actividadcomentario::where('idactividadfamilia',$idactividadfamilia)->get();
        $actividadFamilia = ActividadesFamilia::find($idactividadfamilia);
        $nombreFamilia = User::where('id', $actividadFamilia->idusuario)->first('name');

        return view("actividades.comentarios", compact('comentarios','actividadFamilia','nombreFamilia'));

    }

    public function asignacionActividades()
    { 
        $familias = User::where('idrol', 2)->orderBy('name')->get();
        $actividades = Actividades::paginate(10);
     
        return view("actividades.asignacionActividades", compact('familias','actividades'));

    }

    
    /*
     * Guarda un registro de Actividad y Sus pasos
     * Creacion: 22-06-2023 - Chovanec
     * Ult.Mod:
     */
    public function save(Request $request)
    {   
        $nombreActividad = $request->get('nombre');
        $descripcionActividad = $request->get('descripcion');
        $categorias = $request->get('categorias');

        $tabla = json_decode($request->get('datosTabla'));

        if (!$tabla) 
        {
            return back()->withErrors('Debe ingresar al menos un paso.')->withInput($request->input());
        }

        $rules = [
            'nombre'  => 'required',
            'descripcion' => 'required',
        ];

        $messages = [
            'nombre.required' => 'Debe ingresar un nombre de actividad.',
            'descripcion.required' => 'Debe ingresar una descripción de la actividad',
        ];

        $this->validate($request, $rules, $messages);
        
        $actividad = new Actividades();

        $actividad->nombre = $nombreActividad;
        $actividad->descripcion = $descripcionActividad;
        $actividad->idespecialidad = $categorias;
        $actividad->tipoactividad = 'A'; // tipo A (Actividad) porque los Juegos (J) se crean por desarrolladores 

        DB::transaction(function () use ($actividad, $tabla) 
        {
            $actividad->save();

            //Pasos:
            foreach($tabla as $linea)
            {   
                if($linea[0] !="" & $linea[1] != "")
                {  
                    $pasoActividad = new PasosActividad();

                    $pasoActividad->idactividad =  $actividad->idactividad;
                    $pasoActividad->idpaso =  $linea[0];
                    $pasoActividad->descripcion =  $linea[1];
                    $pasoActividad->save();
                    $pasoActividad = null;
                }
            }

        });

        return back()->with('mensaje', '¡Actividad Creada!');
    }

    public function obtenerRealizado($idfamilia,$fecdesde,$fechasta):array
    { 
        $bindings = [];

        $result=[];

        if(!($idfamilia && $fecdesde && $fechasta))
            return $result;
            
        array_push($bindings, Carbon::now()->format('Y-m-d'));
        array_push($bindings, Carbon::now()->format('Y-m-d'));
        array_push($bindings, $idfamilia);
   
        $sql = "SELECT a.idactividad, IFNULL(b.cantdiasfinalizados,0) cantdiasfinalizados, DATE_FORMAT(a.fecdesde, '%d/%m/%Y') fecdesde, DATE_FORMAT(a.fechasta, '%d/%m/%Y') fechasta ,
                a.idactividadfamilia
                FROM actividadesfamilia a
                LEFT JOIN actividadesavances b ON a.idactividadfamilia = b.idactividadfamilia
                WHERE a.fecdesde <= ? AND a.fechasta >= ?
                AND a.idusuario = ? ";

        $result = DB::select($sql, $bindings);

        return $result;

    }

    public function update(Request $request, $idActividad)
    {   

        $descripcionActividad = $request->get('descripcion');

        $tabla = json_decode($request->get('datosTabla'));

        if (!$tabla) 
        {
            return back()->withErrors('Debe ingresar al menos un paso.')->withInput($request->input());
        }

        $rules = [
            'descripcion' => 'required',
        ];

        $messages = [
            'descripcion.required' => 'Debe ingresar una descripción de la actividad',
        ];

        $this->validate($request, $rules, $messages);
        
        DB::transaction(function () use ($request, $idActividad, $descripcionActividad, $tabla)
        {
            $actividadupdate = Actividades::find($idActividad);
        
            $actividadupdate->descripcion = $descripcionActividad;
        
            $actividadupdate->save();
                   
            $pasos = PasosActividad::where('idactividad',$idActividad);
            $pasos->delete();

            //Pasos:
            foreach($tabla as $linea)
            {   
                if($linea[0] !="" & $linea[1] != "")
                {  
                    $pasoActividad = new PasosActividad();

                    $pasoActividad->idactividad =  $idActividad;
                    $pasoActividad->idpaso =  $linea[0];
                    $pasoActividad->descripcion =  $linea[1];
                    $pasoActividad->save();
                    $pasoActividad = null;
                }
            }

        });

        return back()->with('mensaje', '¡Actividad Actualizada!');
    }
    

}
