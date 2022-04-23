<?php

namespace App\Exports;
use App\Models\Subcategoria;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubcategoriaEmpreExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $subcategoria = Subcategoria::all();     
        return view('Excell.PorAsesor.exportsubcategoria', compact('subcategoria'));
    }
}
