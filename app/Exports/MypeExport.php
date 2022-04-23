<?php

namespace App\Exports;
use App\Models\Producto;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class MypeExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $productos = DB::table('users as u')
        ->join('propietarios as pro', 'pro.usuario_id','=','u.id')
        ->join('empresas as emp', 'emp.propietario_id', '=', 'pro.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->join('subcategorias as sub', 'prod.subcategoria_id', '=', 'sub.id')
        ->join('categorias as ct', 'sub.categoria_id', '=', 'ct.id')
        ->select('prod.id', 'emp.razonsocial', 'prod.nameproducto', 'prod.marca', 'prod.stock', 'prod.preciosugerido', 'prod.estado','prod.modelo','prod.genero','prod.alto','prod.ancho','prod.profundidad','prod.peso','prod.temperatura','prod.oferta','prod.preciosugerido','prod.fecha_vencimiento','prod.stock','prod.descripcion','prod.imguno','prod.imgdos','prod.imgtres','prod.imgprincipal','ct.namecategoria','sub.namesubcategoria')
        ->where('emp.id', '=', Auth::user()->propietario->empresas->id)
        ->where('prod.estado', '=', 'Activo')
        ->get();

        return view('Excell.exportproducto', compact('productos'));
    }
}
