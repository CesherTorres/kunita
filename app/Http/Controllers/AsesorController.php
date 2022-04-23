<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ubigeo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use  PDF;
use App\Exports\AsesorExport;
use Maatwebsite\Excel\Facades\Excel;

class AsesorController extends Controller
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
        $asesores=DB::table('users')->where('tipousuario_id', '=', '2')->get();
        return view('asesor.index',compact('asesores'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportA() 
    {
        return Excel::download(new AsesorExport, 'Total_Asesores.xlsx');
    }
    public function total_asesores()
    {
        $asesores = User::with(['ubigeo'])->where('tipousuario_id', '=', '2')->get();
        $pdf  =  PDF::loadView('asesor.pdfasesor', compact('asesores'));
        set_time_limit(300);
        return  $pdf->donwload('itsolutionstuff.pdf');
    }
    public function total_asesoresI()
    {
        $asesores = User::with(['ubigeo'])->where('tipousuario_id', '=', '2')->get();
        $pdf  =  PDF::loadView('asesor.pdfasesor', compact('asesores'));
        set_time_limit(300);
        return  $pdf->stream('itsolutionstuff.pdf');
    }
    public function reporteI($id)
    {
        $asesores = User::with(['ubigeo'])->where('tipousuario_id', '=', $id)->get();
        $pdf  =  PDF::loadView('asesor.pdfasesor', compact('asesores'));
        set_time_limit(300);
        return  $pdf->stream('itsolutionstuff.pdf');
    }

    public function create()
    {
        $ubigeo = DB::table('ubigeoperu as up')
            ->select('up.id', 'up.departamento', 'up.provincia', 'up.distrito', 'up.ubigeo')
            ->get();

        return view('asesor.create',compact('ubigeo'));
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
            'ndocumento' => ['required','unique:users,ndocumento'],
            'email' => ['required','unique:users,email'],
            'fotouser' => ['required']
   
        ],
        [
            'max' => 'El campo no puede tener mas de :max caracteres',
            'unique' => 'El campo :attribute ya está registrado.'
        ]);
        if($request->hasFile('fotouser')){
            $file = $request->file('fotouser');
            $fotouser = time().$file->getClientOriginalName();
            $file->move(public_path().'/userAsesor/', $fotouser);
        }
        if(($request->input('password')) == ($request->input('confirmpassword'))){
        $asesores = new User();
        $asesores->name = $request->input('name');
        $asesores->tipodocumento = $request->input('tipodocumento');
        $asesores->ndocumento = $request->input('ndocumento');
        $asesores->telefono = $request->input('telefono');
        $asesores->direccion = $request->input('direccion');
        $asesores->fotouser = $fotouser;
        $asesores->estadouser = 'Activo';
        $asesores->email = $request->input('email');
        $asesores->password = Hash::make($request->input('password'));
        $asesores->confirmpassword = Hash::make($request->input('confirmpassword'));
        $asesores->ubigeo_id = $request->input('ubigeo_id');
        $asesores->tipousuario_id = '2';
        $asesores->save();

        return redirect()->route('Asesor.index')->with('addasesor', 'ok');
        }
        else{
            return redirect()->route('Asesor.create')->with('info', 'informacion');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asesor = User::find($id);
        return view('asesor.show', compact('asesor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asesor = User::find($id);
        $ubigeo = DB::table('ubigeoperu as up')
            ->select('up.id', 'up.departamento', 'up.provincia', 'up.distrito', 'up.ubigeo')
            ->get();
        return view('asesor.edit', compact('ubigeo', 'asesor'));
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
        $asesor = User::find($id);
        $asesor->fill($request->except('fotouser','password','confirmpassword'));
        if ($request->hasFile('fotouser')) {
            $file = $request->file('fotouser');
            $fotouser = time().$file->getClientOriginalName();
            $asesor->fotouser = $fotouser;
            $file->move(public_path().'/userAsesor/', $fotouser);
        }
        // if($request->password == $request->confirmpassword){
        //     $asesor->fill([
        //         'password' => Hash::make($request->confirmpassword)
        //       ])->save();
        //       return redirect()->route('Asesor.index')->with('update', 'ok');
        //     }else{
        //         return redirect()->route('Asesor.index')->with('update', 'ok');
        //     }
        $asesor->save();

        return redirect()->route('Asesor.index')->with('update', 'ok');
    }
    public function actualizar(Request $request, $id)
    {
        $asesor = User::find($id);
        // $asesor->fill($request->except('fotouser','password','confirmpassword'));
        // if ($request->hasFile('fotouser')) {
        //     $file = $request->file('fotouser');
        //     $fotouser = time().$file->getClientOriginalName();
        //     $asesor->fotouser = $fotouser;
        //     $file->move(public_path().'/userAsesor/', $fotouser);
        // }
         if($request->password == $request->confirmpassword){
             $asesor->fill([
                 'password' => Hash::make($request->password),
                 'confirmpassword' => Hash::make($request->confirmpassword)
               ])->save();
               return redirect()->route('Asesor.index')->with('update', 'ok');
             }else{
                 return redirect()->route('Asesor.index')->with('info', 'informacion');
             }
        // $asesor->save();

        // return redirect()->route('Asesor.index')->with('update', 'ok');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asesores = User::find($id);
        $file_path = public_path().'/userAsesor'.$asesores->fotouser;
        File::delete($file_path);
        $asesores->delete();
        return redirect()->route('Asesor.index')->with('delete', 'ok');
    }
}
