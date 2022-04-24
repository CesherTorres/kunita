<?php

namespace App\Exports;
use App\Models\Producto;
use App\Models\Empresa;
use App\Models\Subcategoria;
use App\Models\Categoria;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductoEmpreExport implements FromView, WithStyles, WithDrawings, WithColumnWidths, WithCustomStartCell, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        // $productos = DB::table('users as u')
        // ->join('propietarios as pro', 'pro.usuario_id','=','u.id')
        // ->join('empresas as emp', 'emp.propietario_id', '=', 'pro.id')
        // ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        // ->join('subcategorias as sub', 'prod.subcategoria_id', '=', 'sub.id')
        // ->join('categorias as ct', 'sub.categoria_id', '=', 'ct.id')
        // ->select('prod.id', 'emp.razonsocial', 'prod.nameproducto', 'prod.marca', 'prod.stock', 'prod.preciosugerido', 'prod.estado','prod.modelo','prod.genero','prod.alto','prod.ancho','prod.profundidad','prod.peso','prod.temperatura','prod.oferta','prod.preciosugerido','prod.fecha_vencimiento','prod.stock','prod.descripcion','prod.imguno','prod.imgdos','prod.imgtres','prod.imgprincipal','ct.namecategoria','sub.namesubcategoria')
        // ->where('emp.id', '=', Auth::user()->propietario->empresas->id)
        // ->where('prod.estado', '=', 'Activo')
        // ->get();

        $productos = DB::table('users as u')
        ->join('empresas as emp', 'emp.usuario_id', '=', 'u.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->join('subcategorias as sub', 'prod.subcategoria_id', '=', 'sub.id')
        ->join('categorias as ct', 'sub.categoria_id', '=', 'ct.id')
        ->select('prod.id', 'emp.razonsocial', 'prod.nameproducto', 'prod.marca', 'prod.stock', 'prod.preciosugerido', 'prod.estado','prod.modelo','prod.genero','prod.alto','prod.ancho','prod.profundidad','prod.peso','prod.temperatura','prod.oferta','prod.preciosugerido','prod.fecha_vencimiento','prod.stock','prod.descripcion','prod.imguno','prod.imgdos','prod.imgtres','prod.imgprincipal','ct.namecategoria','sub.namesubcategoria')
        ->where('u.id', '=', Auth::user()->id)
        ->where('prod.estado', '=', 'Activo')
        ->get();

        return view('Excell.PorAsesor.exportproducto', compact('productos'));
    }
    public function title(): string
    {
    	return 'Productos';
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            'A1:Q7'    => [
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
            'A8:Q8'    => [
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
            'A' => 8, 'B' => 25, 'C' => 15, 'D' => 18, 'E' => 15, 'F' => 10, 'G' => 23, 'H' => 20, 'I' => 18, 'J' => 12, 'K' => 12, 'L' => 12, 'M' => 22, 'N' => 22, 'O' => 12, 'P' => 15, 'Q' =>12
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
