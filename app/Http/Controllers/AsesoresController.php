<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AsesoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = DB::table('users as e')
        ->join('propietarios as prop', 'e.id', '=', 'prop.usuario_id')
        ->join('empresas as emp', 'prop.id', '=', 'emp.propietario_id')
        ->select(DB::raw('count(*) as empresas'))
        ->where('e.estadouser', '!=', 'Pendiente')
        ->where('emp.usuario_id', '=', Auth::user()->id)
        ->get();//
        
        $productos = DB::table('users as u')
        ->join('empresas as emp', 'emp.usuario_id', '=', 'u.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->select(DB::raw('count(prod.id) as p'))
        ->where('prod.estado', '!=', 'Pendiente')
        ->where('u.id', '=', Auth::user()->id)
        ->get();//

        $sempresas = DB::table('users as e')
        ->join('propietarios as prop', 'e.id', '=', 'prop.usuario_id')
        ->join('empresas as emp', 'prop.id', '=', 'emp.propietario_id')
        ->select(DB::raw('count(*) as se'))
        ->where('e.estadouser', '=', 'Pendiente')
        ->where('emp.usuario_id', '=', Auth::user()->id)
        ->get();//

        $sproductos = DB::table('users as u')
        ->join('empresas as emp', 'emp.usuario_id', '=', 'u.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->select(DB::raw('count(prod.id) as sp'))
        ->where('prod.estado', '=', 'Pendiente')
        ->where('u.id', '=', Auth::user()->id)
        ->get();//

        // return $masvendidos;
        return view('asesores.asesores', compact('empresas', 'productos', 'sempresas', 'sproductos'));
    }

}
