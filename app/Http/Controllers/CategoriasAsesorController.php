<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasAsesorController extends Controller
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
        $categorias = Categoria::all();
        return view('categorias_asesor.index', compact('categorias'));
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
        $validatedData = $request->validate([
            'namecategoria' => ['required', 'max:40', 'unique:categorias,namecategoria']
        ],
        [
            'required' => 'El campo no puede estar vacio',
            'max' => 'El campo no puede tener mas de :max caracteres',
            'unique' => 'La categoria ingresada ya está registrada.'
        ]);
        $categoria = new Categoria();
        $categoria->namecategoria = $request->input('namecategoria');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->save();

        return redirect()->route('categorias_asesor.index')->with('addcategoria', 'ok');
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
        $categoria = Categoria::find($id);
        return view('categorias_asesor.edit', compact('categoria'));
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
        $categoria = Categoria::find($id);
        $categoria->update([
            'namecategoria' => request('namecategori'),
            'descripcion' => request('descripcion'),
        ]);

        $categoria->save();
        

        return redirect()->route('categorias_asesor.index', [$categoria])->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categorias_asesor.index')->with('delete', 'ok');
    }
}
