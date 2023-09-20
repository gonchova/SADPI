<?php

namespace App\Http\Controllers\Coordinador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\ActividadesFamilia;
use App\Models\ActividadesAvances;
use App\Models\ActividadComentario;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {   
        $sql = "SELECT descripcion, idrol 
                FROM roles";
        
        $roles = DB::select($sql);
        
        return view("auth.register", compact('roles'));

    }

    public function listar()
    {   

        $usuarios = User::where('id','!=',Auth::user()->id)->orderBy('name')->paginate(10);;
        
        return view("auth.adminUsuarios", compact('usuarios'));

    }

    public function filtrar(Request $request)
    {   
        $valorUsuario = $request->get('buscaUsuario');

        $usuarios = User::buscar($valorUsuario);
        
        return view("auth.adminUsuarios", compact('usuarios'));
    }


    public function eliminar(Request $request, $idusuario, $confirmaEliminacion = "false")
    {  
         if(isset($_POST['CancelaEliminar']))
        {
            return back()->with(['status' => '', 
            'idusuario' => ''
            ]);
        }

        if ($confirmaEliminacion == "true")
        {   

            $usuario  = User::find($idusuario);
            
            if($usuario)
            {
                DB::transaction(function () use ($idusuario, $usuario)
                {
                    $idactividadesfamilia = ActividadesFamilia::where('idusuario', $idusuario);
                    
                    if($idactividadesfamilia)
                    {
                        $actividadesAvancesFlia = ActividadesAvances::wherein('idactividadfamilia', ActividadesFamilia::select(['idactividadfamilia'])->where('idusuario',$idusuario));
                        if($actividadesAvancesFlia)
                            $actividadesAvancesFlia->delete();

                        $actividadesComentariosFlia = ActividadComentario::wherein('idactividadfamilia', ActividadesFamilia::select(['idactividadfamilia'])->where('idusuario',$idusuario));
                        if($actividadesComentariosFlia)
                            $actividadesComentariosFlia->delete();

                        $actividadesFlia =ActividadesFamilia::where('idusuario', $idusuario);
                        if($actividadesFlia)
                            $actividadesFlia->delete();           
                    }   
                    

                    $usuario->delete();
                });

            }
        }

        return back()->with(['status' => '', 
                            'idusuario' => ''
                            ]);;

     
    }

    public function store(Request $request)
    {  
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'idrol' =>  $request->idrol,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return back()->with('success', 'Usuario generado!');
    }

}
