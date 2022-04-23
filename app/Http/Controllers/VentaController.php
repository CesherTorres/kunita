<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;
use Carbon\Carbon;
use App\Models\Producto;
use App\Models\Detalleventa;
use App\Models\Cobertura;
use Illuminate\Support\Facades\Auth;
use PDF;


use App\Exports\VentaExport;
use Maatwebsite\Excel\Facades\Excel;
class VentaController extends Controller
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
        $ventas = Venta::where('estado','Cerrada')->orderBy('id', 'desc')->where('empresa_id', Auth::user()->propietario->empresas->id)->get();
        $redes = Auth::user();
        return view('ventas.index', compact('ventas','redes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = Carbon::now();
        $coberturas = Cobertura::all()->where('empresa_id', Auth::user()->propietario->empresas->id);
        $productos = DB::table('users as u')
        ->join('propietarios as prop', 'prop.usuario_id', 'u.id')
        ->join('empresas as emp', 'emp.propietario_id', '=', 'prop.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->select('prod.id', 'prod.nameproducto', 'prod.marca', 'prod.stock', 'prod.preciosugerido', 'prod.estado')
        ->where('u.id', '=', Auth::user()->id)
        ->where('prod.estado', '=', 'Activo')
        ->get();
        $redes = Auth::user();
        return view('ventas.create', compact('now', 'productos', 'coberturas','redes'));
    }
    public function exportVS() 
    {
        return Excel::download(new VentaExport, 'Total_Ventas.xlsx');
    }
    public function total_ventasPy()
    {
        $now = Carbon::now();
        $ventas = Venta::all()->where('estado', 'Cerrada');
        $detalleventa = DB::table('detalleventas as dv')
        ->join('productos as p', 'dv.id_producto', '=', 'p.id')
        ->select('p.nameproducto', 'dv.precio', 'dv.cantidad')
        ->get();
 
        $pdf  =  PDF::loadView('ventas.pdftotal', compact('ventas','detalleventa', 'now'));
        set_time_limit(300);
        return  $pdf->download('Reporte_de_Ventas.pdf');
    }
    public function total_ventaAI()
    {
        $ventas = Venta::all()->where('estado', 'Cerrada');
        $detalleventa = DB::table('detalleventas as dv')
        ->join('productos as p', 'dv.id_producto', '=', 'p.id')
        ->select('p.nameproducto', 'dv.precio', 'dv.cantidad')
        ->get();
        $pdf  =  PDF::loadView('ventas.pdftotal', compact('ventas','detalleventa'));
        set_time_limit(300);
        return  $pdf->stream('Reporte_de_Ventas.pdf');
    }
    public function por_ventaPy($id)
    {
        $venta = Venta::find($id);
        $detalleventa = DB::table('detalleventas as dv')
        ->join('productos as p', 'dv.id_producto', '=', 'p.id')
        ->select('p.nameproducto', 'dv.precio', 'dv.cantidad')
        ->where('dv.id_venta', '=', $id)->get();

        $pdf  =  PDF::loadView('ventas.pdfid', compact('venta','detalleventa'));
        set_time_limit(300);
        return  $pdf->stream('Venta_por_Empresa.pdf');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ventas = new Venta();
        $ventas->namecliente = $request->input('namecliente');
        $ventas->direccion = $request->input('direccion');
        $ventas->referencia = $request->input('referencia');
        $ventas->cobertura_id = $request->input('cobertura_id');
        $ventas->tipodocumento = $request->input('tipodocumento');
        $ventas->ndocumento = $request->input('ndocumento');
        $ventas->correo = $request->input('correo');
        $ventas->celular = $request->input('celular');
        $ventas->fecha_hora = $request->input('fecha_hora');
        $ventas->total = $request->input('total');
        $ventas->estado = 'Cerrada';
        $ventas->empresa_id = Auth::user()->propietario->empresas->id;
        $ventas->save();

        $id_producto = $request->input('producto');
        $cantidad = $request->input('cantidad');
        $pventa = $request->input('pventa');

        $cont = 0;
        while ($cont < count($id_producto)) {
            $detalle = new DetalleVenta();
            $detalle->id_venta = $ventas->id;
            $detalle->id_producto = $id_producto[$cont];
            $detalle->precio = $pventa[$cont];
            $detalle->cantidad = $cantidad[$cont];
            $detalle->save();
            $cont = $cont+1;
        }

        return redirect()->route('ventas.index')->with('addventas', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::find($id);
        $detalleventa = DB::table('detalleventas as dv')
        ->join('productos as p', 'dv.id_producto', '=', 'p.id')
        ->select('p.nameproducto', 'dv.precio', 'dv.cantidad')
        ->where('dv.id_venta', '=', $id)->get();
        $redes = Auth::user();
        return view('ventas.show', compact('venta', 'detalleventa','redes'));
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
