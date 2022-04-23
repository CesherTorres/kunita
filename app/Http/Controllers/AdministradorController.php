<?php

namespace App\Http\Controllers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloadmin',['only'=> ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empresas = DB::table('users')
        ->where('estadouser', '!=', 'Pendiente')
        ->where('tipousuario_id', '=', '3')
        ->select(DB::raw('count(*) as e'))
        ->get();
        
        $productos = DB::table('productos')
        ->select(DB::raw('count(*) as p'))
        ->get();

        $sempresas = DB::table('users')
        ->where('estadouser', '=', 'Pendiente')
        ->select(DB::raw('count(*) as se'))
        ->get();

        $sproductos = DB::table('productos')
        ->where('estado', '=', 'Pendiente')
        ->select(DB::raw('count(*) as sp'))
        ->get();

        $asesores = DB::table('users')
        ->where('estadouser', '=', 'Activo')
        ->where('tipousuario_id', '=', 2)
        ->select('users.id','users.name')
        ->get();
        
        // return $masvendidos;
        return view('administrador.administrador', compact('empresas', 'productos', 'sempresas', 'sproductos','asesores'));
    }
    public function logueo(){
        return view('auth.login');
    }
    
}
