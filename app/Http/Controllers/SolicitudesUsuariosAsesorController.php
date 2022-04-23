<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SolicitudesUsuariosAsesorController extends Controller
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
        // $users = DB::table('users as u')
        // ->join('empresas as emp', 'emp.usuario_id', '=', 'u.id')
        // // ->join('propietarios as prop', 'emp.usuario_id', '=', 'u.id')
        // ->select('u.id', 'emp.razonsocial', 'u.name', 'u.telefono', 'u.email', 'u.estadouser')
        // ->where('emp.usuario_id', '=', Auth::user()->id)
        // // ->where('u.estadouser', '=', 'Pendiente')
        // ->get();
        // return view('solicitudesusuarios_asesor.index', compact('users'));
        $users = DB::table('users as u')
        ->join('propietarios as prop', 'prop.usuario_id', '=', 'u.id')
        ->join('empresas as emp', 'emp.propietario_id', '=', 'prop.id')
         ->select('u.id', 'emp.razonsocial', 'u.name', 'u.telefono', 'u.email', 'u.estadouser')
         ->where('emp.usuario_id', '=', Auth::user()->id)
        ->where('u.estadouser', '=', 'Pendiente')
         ->get();
        return view('solicitudesusuarios_asesor.index',compact('users'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('solicitudesusuarios_asesor.edit', compact('user'));
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
        $user = User::find($id);
        $user->fill($request->except('name', 'email', 'tipodocumento', 'ndocumento', 'telefono', 'password', 'confirmpassword', 'tipousuario_id'));
        $user->save();

        return redirect()->route('solicitudesusuarios_asesor.index')->with('solicitud', 'ok');
    }

}
