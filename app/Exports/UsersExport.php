<?php

namespace App\Exports;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;

class UsersExport implements FromView, WithColumnWidths, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $companys= Empresa::all();
        return view('Excell.exportempresa', compact('companys'));
    }
    public function title(): string
    {
    	return 'Empresas';
    }
    public function columnWidths(): array
    {
        return [
            'A' => 20, 'B' => 18, 'C' => 20, 'D' => 12, 'E' => 10, 'F' => 18, 'G' => 15,'H' => 20,'I' => 15,'J' => 20,'K' => 15,'L' => 18,'M' => 15,'N' => 20,'O' => 20,'P' => 18,'Q' => 15,'R' => 18,'S' => 18,'T' => 18, 'U' => 25, 'V' => 20
        ];
    }
}
