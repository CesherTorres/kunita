<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\Empresa;

class SolicitudesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index()
    {
        $alfa = Producto
        ::join("empresas", "empresas.id", "=", "productos.empresa_id")
        ->leftjoin('subcategorias','subcategorias.id','=','productos.subcategoria_id')
        ->join('categorias','subcategorias.categoria_id','=','categorias.id')
        ->select('productos.empresa_id',
        'empresas.razonsocial',
        'productos.nameproducto',
            'productos.marca',
            'productos.modelo',
            'categorias.namecategoria',
            'subcategorias.namesubcategoria',
            'productos.preciosugerido',
            'productos.estado'
        )
        //->where('empresas.estado','<>','2')
        
        //->Where('users.tipousuario_id','=', '3')
        ->get();
        
        return view('solicitudes.index',compact('alfa'));
        
    }
    public function indexP()
    {
        //funcion consultaempresa realizada por alder
        $alfa = Empresa
        ::join("users", "users.id", "=", "empresas.usuario_id")
        ->select('empresas.id','empresas.razonsocial','empresas.estado','users.name', 'users.telefono','users.email')
        //->where('empresas.estado','<>','2')
        
        ->Where('users.tipousuario_id','=', '3')
        ->get();
        
        return view('solicitudes.indexU',compact('alfa'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return view('solicitudes.show');
    }
    public function solace($id){
        $wz = DB::table('empresas')->where('id', $id);
        $wz->update(['estado'=> 'Aceptado']);

        $alfa = Empresa
        ::join("users", "users.id", "=", "empresas.usuario_id")
        ->select('empresas.id','empresas.razonsocial','empresas.estado','users.name', 'users.telefono','users.email')
        //->where('empresas.estado','<>','2')
        ->where('users.tipousuario_id','=', '3')
        
        ->get();
        
        return view('solicitudes.indexU',compact('alfa'));
      
    }
    public function solrec($id){
        $wz = DB::table('empresas')->where('id', $id);
        $wz->update(['estado'=> 'Rechazado']);

        $alfa = Empresa
        ::join("users", "users.id", "=", "empresas.usuario_id")
        ->select('empresas.id','empresas.razonsocial','empresas.estado','users.name', 'users.telefono','users.email')
        //->where('empresas.estado','<>','2')
        
        ->Where('users.tipousuario_id','=', '3')
        ->get();
        
        return view('solicitudes.indexU',compact('alfa'));
        
    }
    public function showUsers($id)
    {
        $beta = Empresa
         ::join("users", "users.id", "=", "empresas.usuario_id")
        ->join("giros", "giros.id", "=", "empresas.giro_id")
        ->join("ubigeoperu", "ubigeoperu.id", "=","empresas.ubigeo_id")
         ->select('users.name',
         'users.tipodocumento',
        'users.ndocumento',
        'users.telefono',
        'users.email',
        'users.password',
        'users.confirmpassword',
        'empresas.id', 
        'empresas.razonsocial',
'empresas.ruc',
"empresas.marca",
'empresas.descripcion',
'empresas.telefonoempresa',
'empresas.correoempresa',
'empresas.direccion',
'empresas.logoempresa',
'empresas.cuentabanco',
'empresas.ncuentabanco',
'empresas.ncuentabancocci',
'empresas.billeteradigital',
'empresas.numerobilletera',
'empresas.enlacefacebook',
'empresas.enlaceinstagram',
'empresas.enlacewhatsapp',
'empresas.usuario_id'

)
         ->where("users.tipousuario_id", "=", '3')
         
         ->findOrFail($id);
         $ubigeos = DB::table('ubigeoperu as up')
         ->select('up.id', 'up.departamento', 'up.provincia', 'up.distrito', 'up.ubigeo')
         ->get();
         $giros = DB::table('giros')
         ->select('*')
         ->get();  
         $users = DB::table('users')
         ->select('*')
         ->get();    
        
        return view('solicitudes.showU',compact('beta','giros','ubigeos','users'));     
//         $alfa = Empresa
// ::join("propietarios", "propietarios.id", "=", "empresas.propietario_id")
// ->join("users", "users.id", "=", "empresas.usuario_id")
// ->join("giros", "giros.id", "=", "empresas.giro_id")
// ->join("ubigeoperu", "ubigeoperu.id", "=","empresas.ubigeo_id")
// ->select("propietarios.nameapp")
// ->where("users.tipousuario_id", "=", 2)
// ->where("empresas.id", "=", $id)
// ->get();
// ->select('empresas.id', 'empresas.razonsocial',
// 'empresas.ruc',
// "empresas.marca",
// 'empresas.descripcion',
// 'empresas.telefonoempresa',
// 'empresas.correoempresa',
// 'empresas.logoempresa',
// 'empresas.cuentabanco',
// 'empresas.ncuentabanco',
// 'empresas.ncuentabancocci',
// 'empresas.billeteradigital',
// 'empresas.numerobilletera',
// 'empresas.enlacefacebook',
// 'empresas.enlaceinstagram',
// 'empresas.enlacewhatsapp',

        // 'propietarios.tipodocumento',
        // 'propietarios.ndocumento',
        // 'propietarios.telefono',
        // 'propietarios.estado',
        // 'propietarios.email',
        // 'propietarios.password')

      
       //return view('solicitudes.showU',compact('alfa'));
    }
}
