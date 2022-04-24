<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cobertura;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use  PDF;
use App\Exports\CoberturaExport;
use Maatwebsite\Excel\Facades\Excel;
class CoberturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coberturas = Cobertura::all()->where('empresa_id', Auth::user()->propietario->empresas->id);
        $ubigeo = DB::table('ubigeoperu as up')
            ->select('up.id', 'up.departamento', 'up.provincia', 'up.distrito', 'up.ubigeo')
            ->get();
        $redes = Auth::user();
        return view('cobertura.index', compact('ubigeo', 'coberturas','redes'));
    }
    public function exportCo() 
    {
        return Excel::download(new CoberturaExport, 'Total_Coberturas.xlsx');
    }
    public function pdf_TotalCo()
    {
        $coberturas = Cobertura::all()->where('empresa_id', Auth::user()->propietario->empresas->id);
        
            $pdf  =  PDF::loadView('cobertura.pdftotalCo', compact('coberturas'));
            set_time_limit(300);
            return  $pdf->download('itsolutionstuff.pdf');
    }
    public function pdf_TotalCoIm()
    {
        $coberturas = Cobertura::all()->where('empresa_id', Auth::user()->propietario->empresas->id);
        
            $pdf  =  PDF::loadView('cobertura.pdftotalCo', compact('coberturas'));
            set_time_limit(300);
            return  $pdf->stream('itsolutionstuff.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cobertura.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cobertura = new Cobertura();
        $cobertura->ubigeocobertura_id = $request->input('ubigeocobertura_id');
        $cobertura->empresa_id = Auth::user()->propietario->empresas->id;
        $cobertura->precioenvio = $request->input('precioenvio');
        $cobertura->diasestimados = $request->input('diasestimados');
        $cobertura->save();

        return redirect()->route('cobertura.index')->with('addcobertura', 'ok');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cobertura = Cobertura::find($id);
        $ubigeo = DB::table('ubigeoperu as up')
            ->select('up.id', 'up.departamento', 'up.provincia', 'up.distrito', 'up.ubigeo')
            ->get();
        return view('cobertura.edit', compact('cobertura', 'ubigeo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cobertura = Cobertura::find($id);
        $cobertura->fill($request->all());
        $cobertura->save();

        return redirect()->route('cobertura.index', [$cobertura])->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cobertura = Cobertura::find($id);
        $cobertura->delete();
        return redirect()->route('cobertura.index')->with('delete', 'ok');
    
    }
}
