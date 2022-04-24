<?php

namespace App\Exports;


use App\Models\Producto;
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

class ProductosExport implements FromView, WithStyles, WithDrawings, WithColumnWidths, WithCustomStartCell, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $productos= Producto::all();
        return view('Excell.exportproducto', compact('productos'));
    }
    public function title(): string
    {
    	return 'Empresas';
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            'A1:P7'    => [
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
            'A8:P8'    => [
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
            'A' => 18, 'B' => 25, 'C' => 15, 'D' => 18, 'E' => 15, 'F' => 10, 'G' => 23, 'H' => 20, 'I' => 18, 'J' => 12, 'K' => 12, 'L' => 12, 'M' => 22, 'N' => 22, 'O' => 12, 'P' => 15
        ];
    }
    public function startCell(): string
    {
        return 'B2';
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('images/kunaq-white.png'));
        $drawing->setHeight(120);
        $drawing->setOffsetX(-80);
        $drawing->setOffsetY(-5);
        $drawing->setCoordinates('B2');

        return $drawing;
    }
    
}