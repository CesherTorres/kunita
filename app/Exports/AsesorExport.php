<?php
namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class AsesorExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $asesores = User::with(['ubigeo'])->where('tipousuario_id', '=', '2')->get();
        return view('Excell.exportasesor', compact('asesores'));
    }
}
