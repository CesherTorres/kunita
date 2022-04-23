<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\Empresa;

class SolicitudesProductosController extends Controller
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
        // $productos = Producto::all()->where('estado', 'Pendiente');
        $productos = DB::table('users as u')
        ->join('empresas as emp', 'emp.usuario_id', '=', 'u.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->select('prod.id', 'emp.razonsocial', 'prod.nameproducto', 'prod.marca', 'prod.modelo', 'prod.preciosugerido', 'prod.estado')
        ->where('prod.estado', '=', 'Pendiente')
        ->get();
        return view('solicitudesproductos.index', compact('productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('solicitudesproductos.edit', compact('producto'));
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
        $producto = Producto::find($id);
        $producto->fill($request->except('nameproducto', 'preciosugerido', 'stock', 'imguno', 'imgdos', 'imgtres', 'imgprincipal', 'subcategoria_id', 'empresa_id'));
        $producto->update([
                'estado_oferta' =>$request['estado_oferta']?1:0,
            ]);   
        $producto->save();

        return redirect()->route('solicitudesproductos.index')->with('solicitud', 'ok');
    }

}
