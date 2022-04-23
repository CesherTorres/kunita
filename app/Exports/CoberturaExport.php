<?php

namespace App\Exports;
use App\Models\Cobertura;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
class CoberturaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $coberturas = Cobertura::all()->where('empresa_id', Auth::user()->id);
        return view('Excell.PorMype.exportcobertura', compact('coberturas'));

    }
}
