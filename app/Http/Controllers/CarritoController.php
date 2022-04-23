<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CarritoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gamas = DB::table('productos as pro')
        ->join('empresas as emp','emp.id','=','pro.empresa_id')
        ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        ->select('pro.id','pro.empresa_id','cob.ubigeocobertura_id')
        ->where('pro.estado','Activo')->get();
       $empuns = DB::table('empresas')
                ->select('id')->get();

        $categorias = Categoria::all();
        $ubigeo = DB::table('ubigeoperu as up')
            ->select('up.id', 'up.departamento', 'up.provincia', 'up.distrito', 'up.ubigeo')
            ->get();
            
            // echo '<pre>';

            // var_dump(\Cart::getContent());
            
            // echo '</pre>';
            
            // die(); 
        return view('store.carrito.index',compact('gamas','empuns','categorias','ubigeo'));
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
