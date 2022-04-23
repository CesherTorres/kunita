<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Models\Giro;
use App\Models\Propietario;
use App\Models\Ubigeo;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use  PDF;
//use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class EmpresasController extends Controller
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
        $users= User::all()->where('estadouser', '!=', 'Pendiente')->where('tipousuario_id', '3');
        return view('empresas.index', compact('users'));
    }
    public function exportE() 
    {
        return Excel::download(new UsersExport, 'Total_Empresas.xlsx');
    }
    public function total_empresas()
    {
        $companys= Empresa::all();
        $pdf  =  PDF::loadView('empresas.pdf_empresa', compact('companys'));
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed'=> TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        set_time_limit(300);
        return  $pdf->download('total_empresas.pdf');
    }
    public function total_empresasI()
    {
        $companys= Empresa::all();
        $pdf  =  PDF::loadView('empresas.pdf_empresa', compact('companys'));
        set_time_limit(300);
        return  $pdf->stream('itsolutionstuff.pdf');
    }
    public function por_empresas($id)
    {
        $company = User::find($id);
        $pdf  =  PDF::loadView('empresas.pdfid', compact('company'));
        set_time_limit(300);
        return  $pdf->download('itsolutionstuff.pdf');
    }

    public function storeempresas()
    {
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $companys= Empresa::all()->where('estadoemp', '=', 'Activo');
        return view('empresas.storeempresas', compact('companys', 'categorias', 'subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $giros = Giro::all();
        $users=DB::table('users')->where('tipousuario_id', '=', '2')->get();
        $ubigeo = DB::table('ubigeoperu as up')
            ->select('up.id', 'up.departamento', 'up.provincia', 'up.distrito', 'up.ubigeo')
            ->get();
        return view('empresas.create', compact('giros', 'users', 'ubigeo'));
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
        $user->estadouser = 'Activo';
        $user->password =  Hash::make($request->input('password'));
        $user->confirmpassword = Hash::make($request->input('confirmpassword'));
        $user->tipousuario_id = '3';
        $user->save();

        $propietario = new Propietario();
        $propietario->usuario_id = $user->id;
        $propietario->save();

        $company = new Empresa();
        $company->razonsocial = $request->input('razonsocial');
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
        $company->enlacewhatsapp = $request->input('enlacewhatsapp');
        $company->estadoemp = 'Activo';
        
        $company->giro_id = $request->input('giro_id');
        $company->propietario_id = $propietario->id;
        $company->usuario_id = $request->input('usuario_id');

        $company->ubigeo_id = $request->input('ubigeo_id');
        $company->save();

        return redirect()->route('empresas.index')->with('addcompany', 'ok');
        }
        else{
            return redirect()->route('empresas.create')->with('info', 'informacion');
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
        
        $user = User::find($id);
        return view('empresas.show', compact('user'));
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
        $giros = Giro::all();
        $asesores=DB::table('users')->where('tipousuario_id', '=', '2')->get();
        $ubigeo = DB::table('ubigeoperu as up')
            ->select('up.id', 'up.departamento', 'up.provincia', 'up.distrito', 'up.ubigeo')
            ->get();
        return view('empresas.edit', compact('giros', 'asesores', 'ubigeo', 'user'));
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $user=User::where('id','=',$id)->firstOrFail();
        $user->fill($request->all());
        $user->save();
        $company=Empresa::where('id','=',$request->input('idempresa'))->firstOrFail();
        $company->fill($request->except('logoempresa','password','confirmpassword'));
        if($request->hasFile('logoempresa')){
            $file = $request->file('logoempresa');
            $logoempresa = time().$file->getClientOriginalName();
            $company->logoempresa = $logoempresa;
            $file->move(public_path().'/logos/', $logoempresa);
        }
        $company->save();
          
        return redirect()->route('empresas.index')->with('update', 'ok');
        // $input = $request->all();
        // return $input;
    }
    public function actualizar(Request $request, $id)
    {
        $user=User::where('id','=',$id)->firstOrFail();
        // $asesor->fill($request->except('fotouser','password','confirmpassword'));
        // if ($request->hasFile('fotouser')) {
        //     $file = $request->file('fotouser');
        //     $fotouser = time().$file->getClientOriginalName();
        //     $asesor->fotouser = $fotouser;
        //     $file->move(public_path().'/userAsesor/', $fotouser);
        // }
         if($request->password == $request->confirmpassword){
             $user->fill([
                 'password' => Hash::make($request->password),
                 'confirmpassword' => Hash::make($request->confirmpassword)
               ])->save();
               return redirect()->route('empresas.index')->with('update', 'ok');
             }else{
                 return redirect()->route('empresas.index')->with('info', 'informacion');
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
        // $company=Empresa::where('id','=',$id)->firstOrFail();
        // // $company = Empresa::find($id);
        // $file_path = public_path().'/logos'.$company->logoempresa;
        // File::delete($file_path);
        // $company->delete();

        
        $user = User::find($id);
        $user->delete();

        return redirect()->route('empresas.index')->with('delete', 'ok');
    }
}
