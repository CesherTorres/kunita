<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;
use Carbon\Carbon;
use App\Models\Producto;
use App\Models\Detalleventa;
use App\Models\Cobertura;
use App\Models\Categoria;

use Illuminate\Support\Facades\Auth;
use PDF;
use Session;

use App\Exports\VentaExport;
use Maatwebsite\Excel\Facades\Excel;
class VentaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        $ventas = Venta::all();
        return view('store.pedido_realizado', compact('categorias','ventas'));
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
    public function Cliente_venta($id)
    {
        $venta = Venta::find($id);
        $detalleventa = DB::table('detalleventas as dv')
        ->join('productos as p', 'dv.id_producto', '=', 'p.id')
        ->select('p.nameproducto', 'dv.precio', 'dv.cantidad')
        ->where('dv.id_venta', '=', $id)->get();
        $pdf  =  PDF::loadView('store.pdfVentaCliente', compact('venta','detalleventa'))->setOptions(['isHtml5ParserEnabled'=> true,'isRemoteEnabled' => true]);
        set_time_limit(300);
        return  $pdf->stream('Reporte_compra.pdf');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

            $date = Carbon::now();

            $ventas = new Venta();
            $ventas->namecliente = $request->input('nombres');
            $ventas->direccion = $request->input('diireccion');
            $ventas->referencia = $request->input('referencias');
            $ventas->tipodocumento = $request->input('Tdocumentos');
            $ventas->ndocumento = $request->input('Ndocumentos');
            $ventas->correo = $request->input('correos');
            $ventas->celular = $request->input('telefonos');
            $ventas->fecha_hora = $date->addDay($request->input('fechas'));
            $ventas->total = $request->input('subtots');
            $ventas->estado = 'Abierta';
            $ventas->cobertura_id = $request->input('idcobertura');
            $ventas->empresa_id = $request->input('empresas');
            $ventas->save(); 

            
            $carrito = \Cart::getContent();
            $total=0;
            $envio=0;
            foreach($carrito as $venta){
                    $detalle = new DetalleVenta();
                    $detalle->id_venta = $ventas->id;
                    $detalle->id_producto = $venta->id;
                    $detalle->precio = $venta->price;
                    $detalle->cantidad = $venta->quantity;
                    $envio = $venta->precioenvio;
                    $detalle->save();
                    
                    $subtotal=floatval($venta->price)*intval($venta->quantity);
                    $total+=$subtotal;
            }
            $ventas->total=$total;
            $ventas->precio_envio=$envio;
            $ventas->save();
            \Cart::clear();
            session::forget('empresa_id');
            
                // $cont = 0;
                // while ($cont < count($id_producto)) {
                    
                //     $detalle = new DetalleVenta();
                //     $detalle->id_venta = $ventas->id;
                //     $detalle->id_producto = $id_producto[$cont];
                //     $detalle->precio = $pventa[$cont];
                //     $detalle->cantidad = $cantidad[$cont];
                //     $detalle->save();
                //     $cont = $cont+1;
                return redirect()->route('store.show', $ventas->id)->with('addventas', 'ok');
            }
        
        //return 'saved';
    public function guardarventa(Request $request)
    {
        list($cobecod) = Cobertura::select('id')
                   ->where('ubigeocobertura_id','=', $request->ubi)
                   ->where('empresa_id','=', $request->empresa_id)
                   ->get('id');
                   
        Venta::create([
        'namecliente' => $request->nombres,
        'direccion' => $request->diireccion,
        'referencia' => $request->referencias,
        'cobertura_id' => $cobecod->id,
        'tipodocumento' => $request->Tdocumentos,
        'ndocumento' => $request->Ndocumentos,
        'correo' => $request->correos,
        'celular' => $request->telefonos,
        'fecha_hora' => Carbon::now(),
        'total' => $request->totalidad,
        'estado' => 'Abierta',
        'empresa_id' => $request->empresa_id
        ]);
        $data = Venta::select('id')->latest('id')->first();
        return response(json_encode($data),200);
       
    }
    public function detalleve(Request $request)
    {
        Detalleventa::create([
            'id_venta' => $request->id_venta,
            'id_producto' => $request->id_producto,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio
            ]);
            
          //  return response()->json(["mensaje" => "listo"]);
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
        return view('store.show', compact('venta', 'detalleventa'));
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
