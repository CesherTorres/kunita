<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PedidoController extends Controller
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
        $redes = Auth::user();
        $pedidos = Venta::where('estado', 'Abierta')->where('empresa_id', Auth::user()->propietario->empresas->id)->get();
        return view('Pedido.index', compact('pedidos','redes'));
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
        $redes = Auth::user();
        $pedido = Venta::find($id);
        $detallepedido = DB::table('detalleventas as dv')
        ->join('productos as p', 'dv.id_producto', '=', 'p.id')
        ->select('p.nameproducto', 'dv.precio', 'dv.cantidad')
        ->where('dv.id_venta', '=', $id)->get();
        return view('Pedido.edit', compact('pedido', 'detallepedido','redes'));
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
        $pedido = Venta::find($id);
        $pedido->fill($request->except('namecliente', 'direccion', 'referencia', 'tipodocumento', 'ndocumento', 'correo', 'celular', 'fecha_hora', 'empresa_id'));
        $pedido->save();
        return redirect()->route('pedidos.index')->with('addventacerrada', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Venta::find($id);
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('delete', 'ok');
    }
}