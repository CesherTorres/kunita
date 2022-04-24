<?php

namespace App\Exports;

use App\Models\Venta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VentaExport implements FromView, WithStyles, WithDrawings, WithColumnWidths, WithCustomStartCell, WithTitle
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
    public function title(): string
    {
    	return 'Ventas';
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            'A1:M7'    => [
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
            'A8:M8'    => [
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
            'A' => 5, 'B' => 25, 'C' => 15, 'D' => 18, 'E' => 15, 'F' => 33, 'G' => 23, 'H' => 20, 'I' => 33, 'J' => 18, 'K' => 25, 'L' => 15, 'M' => 25, 'N' => 15, 'O' => 15, 'P' => 15, 'Q' => 18, 'R' => 18, 'S' => 20, 'T' => 20, 'U' => 20, 'V' => 25, 'W' => 27
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
        $drawing->setOffsetX(-10);
        $drawing->setOffsetY(-5);
        $drawing->setCoordinates('B2');

        return $drawing;
    }
    
}
