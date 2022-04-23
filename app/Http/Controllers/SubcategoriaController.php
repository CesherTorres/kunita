<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Support\Facades\DB;
use  PDF;
use App\Exports\SubcategoriaExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class SubcategoriaController extends Controller
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
        $Categorias = Categoria::all();
        $subcategoria = Subcategoria::with(['categoria'])->get();
        return view('subcategoria.index', compact('Categorias','subcategoria'));
    }
    public function exportS() 
    {
        return Excel::download(new SubcategoriaExport, 'Total_subcategorias.xlsx');
    }
    public function total_categorias()
    {
        $subcategoria = Subcategoria::all();        
        $pdf  =  PDF::loadView('subcategoria.pdfTotal', compact('subcategoria'));
        set_time_limit(300);
        return  $pdf->download('itsolutionstuff.pdf');
    }

    public function total_categoriasI()
    {
        $subcategoria = Subcategoria::all();        
        $pdf  =  PDF::loadView('subcategoria.pdfTotal', compact('subcategoria'));
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
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namesub' => ['max:40', 'unique:subcategorias,namesubcategoria']
        ],
        [
            
            'max' => 'El campo no puede tener mas de :max caracteres',
            'unique' => 'La subcategoria ingresada ya está registrada.'
        ]);

        $subcategoria = new Subcategoria();
        $subcategoria->categoria_id = $request->input('subcategoria');
        $subcategoria->namesubcategoria = $request->input('namesub');
        $subcategoria->save();

        return redirect()->route('index.subcategory');
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
        //
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
        $subcategoria = Subcategoria::find($id);
        $subcategoria->update([
            'namesubcategoria' => request('namesub'),
        ]);

        $subcategoria->save();

        return redirect()->route('index.subcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategoria = Subcategoria::find($id);
        $subcategoria->delete();
        return redirect()->route('index.subcategory');
    }
}
