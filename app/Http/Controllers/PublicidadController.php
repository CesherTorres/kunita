<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicidad;
use Illuminate\Support\Facades\File;

class PublicidadController extends Controller
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
        $publicidad = Publicidad::all();
        return view('publicidad.index', compact('publicidad'));
    }
    public function listitaPu()
    {
        return view('publicidad.lista');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publicidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $nameimagen = time().$file->getClientOriginalName();
            $file->move(public_path().'/publicidad_img/', $nameimagen);
        }

        $publicidad = new Publicidad();
        $publicidad->propietario = $request->input('propietario');
        $publicidad->titulo = $request->input('titulo');
        $publicidad->tipo = $request->input('tipo');
        $publicidad->correo = $request->input('correo');
        $publicidad->telefono = $request->input('telefono');
        $publicidad->descripcion = $request->input('descripcion');
        $publicidad->enlace = $request->input('enlace');
        $publicidad->imagen = $nameimagen;
        $publicidad->save();

        return redirect()->route('publicidad.index')->with('addpublicidad', 'ok');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicidad= Publicidad::find($id);
        return view('publicidad.show', compact('publicidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicidad= Publicidad::find($id);
        return view('publicidad.edit', compact('publicidad'));
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
        $publicidad = Publicidad::find($id);
        $publicidad->fill($request->except('imagen'));
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $nameimagen = time().$file->getClientOriginalName();
            $publicidad->imagen = $nameimagen;
            $file->move(public_path().'/publicidad_img/', $nameimagen);
        }
        $publicidad->save();

        return redirect()->route('publicidad.index')->with('update', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publicidad = Publicidad::find($id);
        $file_path = public_path().'/publicidad_img'.$publicidad->imagen;
        File::delete($file_path);
        $publicidad->delete();
        return redirect()->route('publicidad.index')->with('delete', 'ok');
    }
}
