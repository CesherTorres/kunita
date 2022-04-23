<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;
use  PDF;
use App\Exports\SubcategoriaEmpreExport;
use Maatwebsite\Excel\Facades\Excel;
class SubcategoriasAsesorController extends Controller
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
        $subcategorias = Subcategoria::with(['categoria'])->get();
        return view('subcategorias_asesor.index', compact('Categorias','subcategorias'));
    }
    public function exportSA() 
    {
        return Excel::download(new SubcategoriaEmpreExport, 'Total_subcategorias.xlsx');
    }
    public function total_categoriasSA()
    {
        $subcategoria = Subcategoria::all();        
        $pdf  =  PDF::loadView('subcategoria.pdfTotal', compact('subcategoria'));
        set_time_limit(300);
        return  $pdf->download('itsolutionstuff.pdf');
    }
    public function total_categoriasSAI()
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategoria = new Subcategoria();
        $subcategoria->categoria_id = $request->input('categoria_id');
        $subcategoria->namesubcategoria = $request->input('namesubcategoria');
        $subcategoria->save();

        return redirect()->route('subcategorias_asesor.index')->with('addsubcategoria', 'ok');
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
        $subcategorias = Subcategoria::find($id);
        return view('subcategorias_asesor.edit', compact('subcategorias'));
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
        $validatedData = $request->validate([
            'namesub' => ['max:40', 'unique:subcategorias,namesubcategoria']
        ],
        [
            
            'max' => 'El campo no puede tener mas de :max caracteres',
            'unique' => 'La subcategoria ingresada ya está registrada.'
        ]);
        $subcategoria = Subcategoria::find($id);
        $subcategoria->fill($request->all());
        $subcategoria->save();

        return redirect()->route('subcategorias_asesor.index')->with('update', 'ok');
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
        return redirect()->route('subcategorias_asesor.index')->with('delete', 'ok');
    }
}
