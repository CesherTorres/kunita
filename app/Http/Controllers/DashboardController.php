<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $anio=date('Y');

        if ($request->asesor_id && $request->fecha_inicio && $request->fecha_fin) {

            $producto = DB::table('ventas as v')
            ->join('detalleventas as dt', 'v.id', '=', 'dt.id_venta')
            ->join('productos as p', 'p.id', '=', 'dt.id_producto' )
            ->join('empresas as em', 'em.id', '=', 'v.empresa_id' )
            ->select('dt.id_producto', 'p.nameproducto as nameproducto', DB::raw('sum(dt.cantidad) as totalventas'), DB::raw('MONTH(v.fecha_hora) as mes'), DB::raw('YEAR(v.fecha_hora) as anio'))
            ->whereBetween('v.created_at',[carbon::parse($request->fecha_inicio)->format('Y-m-d'),carbon::parse($request->fecha_fin)->format('Y-m-d')])
            ->where('v.estado', '=', 'Cerrada')
            ->where('em.usuario_id',$request->asesor_id)
            ->groupBy('dt.id_producto', 'p.nameproducto', DB::raw('MONTH(v.fecha_hora)'), DB::raw('YEAR(v.fecha_hora)'))
            ->orderByDesc(DB::raw('sum(dt.cantidad)'))
            ->limit(1)
            ->get();
    
            $empresa = DB::table('empresas as e')
            ->select('e.estadoemp as estado', DB::raw('count(*) as activos'))
            ->where('usuario_id',$request->asesor_id)
            ->where('estadoemp', 'Activo')
            ->whereBetween('fecha_activate',[carbon::parse($request->fecha_inicio)->format('Y-m-d'),carbon::parse($request->fecha_fin)->format('Y-m-d')])
            ->groupBy('e.estadoemp')
            ->get();
    
            $empresai = DB::table('empresas as e')
            ->select('e.estadoemp as estadoi', DB::raw('count(*) as inactivos'))
            ->where('estadoemp', 'Inactivo')
            ->groupBy('e.estadoemp')
            ->get();

        }else{

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

        }

        $asesores = DB::table('users')
        ->where('estadouser', '=', 'Activo')
        ->where('tipousuario_id', '=', 2)
        ->select('users.id','users.name')
        ->get();

        return ['producto'=>$producto, 'empresa'=>$empresa, 'empresai'=>$empresai, 'anio'=>$anio, 'asesores'=>$asesores,'newData' => $request->all()];

    }
}
