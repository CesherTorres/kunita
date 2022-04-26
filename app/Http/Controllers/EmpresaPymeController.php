<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giro;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Subcategoria;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Propietario;
use App\Models\Empresa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
class EmpresaPymeController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $giros = Giro::all();
        $users=DB::table('users')->where('tipousuario_id', '=', '2')->get();
        $ubigeo = DB::table('ubigeoperu as up')
            ->select('up.id', 'up.departamento', 'up.provincia', 'up.distrito', 'up.ubigeo')
            ->get();
        return view('empresapyme.create', compact('giros', 'users', 'ubigeo', 'categorias', 'subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now();
        $date = $now->format('Y-m-d');
        $validatedData = $request->validate([
            'ndocumento' => ['unique:users,ndocumento'],
            'email' => ['unique:users,email'],
            'razonsocial' => ['unique:empresas,razonsocial'],
            'ruc' => ['unique:empresas,ruc'],
            'correoempresa' => ['unique:empresas,correoempresa']
            // 'ncuentabanco' => ['unique:empresas,ncuentabanco'],
            // 'ncuentabancocci' => ['unique:empresas,ncuentabancocci'],
            // 'numerobilletera' => ['unique:empresas,numerobilletera']
   
        ],
        [
            'max' => 'El campo no puede tener mas de :max caracteres',
            'unique' => 'El campo :attribute ya está registrado.'
        ]);

        if($request->hasFile('logoempresa')){
            $file = $request->file('logoempresa');
            $logoempresa = time().$file->getClientOriginalName();
            $file->move(public_path().'/logos/', $logoempresa);
        }
        if(($request->input('password')) == ($request->input('confirmpassword'))){
        $user = new User();
        $user->name = $request->input('name');
        $user->tipodocumento = $request->input('tipodocumento');
        $user->ndocumento = $request->input('ndocumento');
        $user->telefono = $request->input('telefono');
        $user->email = $request->input('email');
        $user->estadouser = 'Pendiente';
        $user->password =  Hash::make($request->input('password'));
        $user->confirmpassword = Hash::make($request->input('confirmpassword'));
        $user->tipousuario_id = '3';
        $user->save();

        $propietario = new Propietario();
        $propietario->usuario_id = $user->id;
        $propietario->save();

        $company = new Empresa();
        $company->razonsocial = $request->input('razonsocial');
        $company->slug = Str::slug($request->input('razonsocial'));
        $company->ruc = $request->input('ruc');
        $company->marca = $request->input('marca');
        $company->descripcion = $request->input('descripcion');
        $company->telefonoempresa = $request->input('telefonoempresa');
        $company->correoempresa = $request->input('correoempresa');
        $company->direccion = $request->input('direccion');
        $company->logoempresa = $logoempresa;
        $company->cuentabanco = $request->input('cuentabanco');
        $company->ncuentabanco = $request->input('ncuentabanco');
        $company->ncuentabancocci = $request->input('ncuentabancocci');
        $company->billeteradigital = $request->input('billeteradigital');
        $company->numerobilletera = $request->input('numerobilletera');
        $company->enlacefacebook = $request->input('enlacefacebook');
        $company->enlaceinstagram = $request->input('enlaceinstagram');
        $company->fecha_activate = $date;
        $company->enlacewhatsapp = $request->input('enlacewhatsapp');
        $company->estadoemp = 'Pendiente';
        
        $company->giro_id = $request->input('giro_id');
        $company->propietario_id = $propietario->id;
        $company->usuario_id = $request->input('usuario_id');

        $company->ubigeo_id = $request->input('ubigeo_id');
        $company->save();

        return redirect()->route('nueva_empresa.create')->with('addempresapyme', 'ok');
        
        }else{
            return redirect()->route('nueva_empresa.create')->with('info', 'informacion');

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
