<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardAsesorController extends Controller
{
    public function __invoke(Request $request)
    {
        $anio=date('Y');

        $producto = DB::table('ventas as v')
        ->join('detalleventas as dt', 'v.id', '=', 'dt.id_venta')
        ->join('productos as p', 'p.id', '=', 'dt.id_producto' )
        ->join('empresas as emp', 'emp.id', '=', 'p.empresa_id' )
        ->join('users as u', 'u.id', '=', 'emp.usuario_id' )
        ->select('dt.id_producto', 'emp.razonsocial as razonsocial', 'p.nameproducto as nameproducto', DB::raw('sum(dt.cantidad) as totalventas'), DB::raw('MONTH(v.fecha_hora) as mes'), DB::raw('YEAR(v.fecha_hora) as anio'))
        
        
        ->groupBy('dt.id_producto', 'emp.razonsocial', 'p.nameproducto', DB::raw('MONTH(v.fecha_hora)'), DB::raw('YEAR(v.fecha_hora)'))
        ->whereYear('v.fecha_hora', $anio)
        ->where('u.id', '=', Auth::user()->id)
        ->orderByDesc(DB::raw('sum(dt.cantidad)'))
        ->limit(1)
        ->get();

        $empresa = DB::table('empresas as e')
        ->select('e.estadoemp as estado', DB::raw('count(*) as activos'))
        ->where('estadoemp', 'Activo')
        ->where('e.usuario_id', '=', Auth::user()->id)
        ->groupBy('e.estadoemp')
        ->get();

        $empresai = DB::table('empresas as e')
        ->select('e.estadoemp as estadoi', DB::raw('count(*) as inactivos'))
        ->where('estadoemp', 'Inactivo')
        ->where('e.usuario_id', '=', Auth::user()->id)
        ->groupBy('e.estadoemp')
        ->get();


        return ['producto'=>$producto, 'empresa'=>$empresa, 'empresai'=>$empresai, 'anio'=>$anio];




    }
}
