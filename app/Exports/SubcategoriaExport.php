<?php

namespace App\Exports;

use App\Models\Subcategoria;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubcategoriaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $subcategoria = Subcategoria::all();     
        return view('Excell.exportsubcategoria', compact('subcategoria'));
    }
}
