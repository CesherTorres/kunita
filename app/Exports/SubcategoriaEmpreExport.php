<?php

namespace App\Exports;
use App\Models\Subcategoria;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class SubcategoriaEmpreExport implements FromView, WithStyles, WithColumnWidths, WithCustomStartCell, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $subcategoria = Subcategoria::all();     
        return view('Excell.PorAsesor.exportsubcategoria', compact('subcategoria'));
    }
    public function title(): string
    {
    	return 'Subcategorias';
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            'A1:D7'    => [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => '0069AA'],
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],
            'D6:E6' => [
                'underline'       =>  true,
            ],
            'A8:D8'    => [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                        'color' => ['argb' => '6E7E6B'],
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];

    }
    public function columnWidths(): array
    {
        return [
            'A' => 5, 'B' => 25, 'C' => 26, 'D' => 33
        ];
    }
    public function startCell(): string
    {
        return 'B2';
    }
    
}
