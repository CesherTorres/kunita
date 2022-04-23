<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicidad;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PymeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solopyme',['only'=> ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicidad = DB::table('publicidads as p')
        ->select('p.id','p.titulo', 'p.propietario', 'p.tipo', 'p.correo', 'p.telefono', 'p.descripcion', 'p.enlace', 'p.imagen')
        ->where('p.tipo', '!=', 'Slider')
        ->orderByDesc('p.id')
        ->take(6)
        ->get();
        $user = Auth::user();
        return view('Pyme.pyme', compact('publicidad','user'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
