<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardPymeController extends Controller
{
    public function __invoke(Request $request)
    {
        $anio=date('Y');

        $producto = DB::table('ventas as v')
        ->join('detalleventas as dt', 'v.id', '=', 'dt.id_venta')
        ->join('productos as p', 'p.id', '=', 'dt.id_producto' )
        ->join('empresas as emp', 'emp.id', '=', 'p.empresa_id' )
        ->where('v.estado', '=', 'Cerrada')
        ->select('dt.id_producto', 'emp.razonsocial as razonsocial', 'p.nameproducto as nameproducto', DB::raw('sum(dt.cantidad) as totalventas'), DB::raw('MONTH(v.fecha_hora) as mes'), DB::raw('YEAR(v.fecha_hora) as anio'))
        ->groupBy('dt.id_producto', 'emp.razonsocial', 'p.nameproducto', DB::raw('MONTH(v.fecha_hora)'), DB::raw('YEAR(v.fecha_hora)'))
        ->whereYear('v.fecha_hora', $anio)
        ->where('p.empresa_id', '=', Auth::user()->propietario->empresas->id)
        ->orderByDesc(DB::raw('sum(dt.cantidad)'))
        ->limit(1)
        ->get();

        $venta=DB::table('ventas as v')
        ->select(DB::raw('MONTH(v.fecha_hora)as mes'),
        DB::raw('YEAR(v.fecha_hora) as anio'),
        DB::raw('sum(v.total) as total'))
        ->whereYear('v.fecha_hora', $anio)
        ->groupBy(DB::raw('MONTH(v.fecha_hora)'), DB::raw('YEAR(v.fecha_hora)'))
        ->where('v.empresa_id', '=', Auth::user()->propietario->empresas->id)
        ->where('v.estado', '=', 'Cerrada')
        ->get();


        return ['producto'=>$producto, 'venta'=>$venta,  'anio'=>$anio];




    }
}
