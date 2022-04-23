<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $anio=date('Y');

        $producto = DB::table('ventas as v')
        ->join('detalleventas as dt', 'v.id', '=', 'dt.id_venta')
        ->join('productos as p', 'p.id', '=', 'dt.id_producto' )
        ->select('dt.id_producto', 'p.nameproducto as nameproducto', DB::raw('sum(dt.cantidad) as totalventas'), DB::raw('MONTH(v.fecha_hora) as mes'), DB::raw('YEAR(v.fecha_hora) as anio'))
        ->whereYear('v.fecha_hora', $anio)
        ->where('v.estado', '=', 'Cerrada')
        ->groupBy('dt.id_producto', 'p.nameproducto', DB::raw('MONTH(v.fecha_hora)'), DB::raw('YEAR(v.fecha_hora)'))
        ->orderByDesc(DB::raw('sum(dt.cantidad)'))
        ->limit(1)
        ->get();

        $empresa = DB::table('empresas as e')
        ->select('e.estadoemp as estado', DB::raw('count(*) as activos'))
        ->where('estadoemp', 'Activo')
        ->groupBy('e.estadoemp')
        ->get();

        $empresai = DB::table('empresas as e')
        ->select('e.estadoemp as estadoi', DB::raw('count(*) as inactivos'))
        ->where('estadoemp', 'Inactivo')
        ->groupBy('e.estadoemp')
        ->get();


        return ['producto'=>$producto, 'empresa'=>$empresa, 'empresai'=>$empresai, 'anio'=>$anio];




    }
}
