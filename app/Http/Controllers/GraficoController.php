<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GraficoController extends Controller
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
        $tventas=DB::table('ventas as v')
            
            ->select(DB::raw('sum(v.total) as total'))
            ->where('estado', '=', 'Cerrada')
            ->where('v.empresa_id', '=', Auth::user()->propietario->empresas->id)
            ->get();

        $tcventas=DB::table('ventas as v')
            ->select(DB::raw('count(*) as ventitas'))
            ->where('estado', '=', 'Cerrada')
            ->where('v.empresa_id', '=', Auth::user()->propietario->empresas->id)
            ->get();

        $tcpventas=DB::table('ventas as v')
            ->select(DB::raw('count(*) as pventitas'))
            ->where('estado', '=', 'Abierta')
            ->where('v.empresa_id', '=', Auth::user()->propietario->empresas->id)
            ->get();

        $productos=DB::table('productos as p')
            ->select(DB::raw('count(*) as prod'))
            ->where('estado', '!=', 'Pendiente')
            ->where('p.empresa_id', '=', Auth::user()->propietario->empresas->id)
            ->get();

        $redes = Auth::user();
        return view('graficos.index', compact('tventas', 'tcventas', 'tcpventas', 'productos','redes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
