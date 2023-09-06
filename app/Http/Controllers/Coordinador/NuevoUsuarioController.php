<?php

namespace App\Http\Controllers\Coordinador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NuevoUsuarioController extends Controller
{
    public function index()
    {   
        $sql = "SELECT descripcion, idrol 
                FROM roles";
        
        $roles = DB::select($sql);
        
        return view("auth.register", compact('roles'));

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
