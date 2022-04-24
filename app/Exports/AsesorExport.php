<?php
namespace App\Exports;

use App\Models\User;
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

class AsesorExport implements FromView, WithStyles, WithDrawings, WithColumnWidths, WithCustomStartCell, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $asesores = User::with(['ubigeo'])->where('tipousuario_id', '=', '2')->get();
        return view('Excell.exportasesor', compact('asesores'));
    }
    public function title(): string
    {
    	return 'Asesores';
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            'A1:H7'    => [
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
            'A8:H8'    => [
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
            'A' => 5, 'B' => 26, 'C' => 16, 'D' => 20, 'E' => 28, 'F' => 12, 'G' => 25, 'H' => 15
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
        $drawing->setHeight(60);
        $drawing->setOffsetX(-20);
        $drawing->setOffsetY(30);
        $drawing->setCoordinates('B2');

        return $drawing;
    }
    
}
