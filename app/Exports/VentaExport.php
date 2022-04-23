<?php

namespace App\Exports;

use App\Models\Venta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class VentaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $ventas = Venta::all()->where('estado', 'Cerrada');
        $detalleventa = DB::table('detalleventas as dv')
        ->join('productos as p', 'dv.id_producto', '=', 'p.id')
        ->select('p.nameproducto', 'dv.precio', 'dv.cantidad')
        ->get();

        return view('Excell.PorMype.exportventa', compact('ventas','detalleventa'));

    }
}
