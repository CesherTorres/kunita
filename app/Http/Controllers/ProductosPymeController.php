<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Empresa;
use App\Models\Subcategoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use  PDF;
use App\Exports\MypeExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
class ProductosPymeController extends Controller
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
        $productos = DB::table('users as u')
        ->join('propietarios as prop', 'prop.usuario_id', 'u.id')
        ->join('empresas as emp', 'emp.propietario_id', '=', 'prop.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->join('subcategorias as sub', 'prod.subcategoria_id', '=', 'sub.id')
        ->join('categorias as ct', 'sub.categoria_id', '=', 'ct.id')
        ->select('prod.id', 'prod.nameproducto', 'prod.fecha_vencimiento','prod.marca', 'prod.stock', 'prod.preciosugerido', 'prod.estado','ct.namecategoria','sub.namesubcategoria')
        ->where('prod.empresa_id', Auth::user()->propietario->empresas->id)
        // ->where('prod.estado', '=', 'Activo')
        ->get();
        $redes = Auth::user();
        $now = Carbon::now();
        // $productos = Producto::all()->where('estado', 'Activo')->where('empresa_id', );
        return view('productos_pyme.index', compact('productos','redes','now'));
    }
    public function total_productosEPy() 
    {
        return Excel::download(new MypeExport, 'Total_Productos.xlsx');
    }
    public function total_productosPyid($id)
    {
        $now = Carbon::now();
        $producto = Producto::find($id);
        $pdf  =  PDF::loadView('productos_pyme.pdfid', compact('producto', 'now'));
        set_time_limit(300);
        return  $pdf->download('Producto_Empresas.pdf');
    }
    public function total_productosPY()
    {
        $now = Carbon::now();
        $productos = DB::table('users as u')
        ->join('propietarios as pro', 'pro.usuario_id','=','u.id')
        ->join('empresas as emp', 'emp.propietario_id', '=', 'pro.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->join('subcategorias as sub', 'prod.subcategoria_id', '=', 'sub.id')
        ->join('categorias as ct', 'sub.categoria_id', '=', 'ct.id')
        ->select('prod.id', 'emp.razonsocial', 'prod.nameproducto', 'prod.marca', 'prod.stock', 'prod.preciosugerido', 'prod.estado','prod.modelo','prod.genero','prod.alto','prod.ancho','prod.profundidad','prod.peso','prod.temperatura','prod.oferta','prod.preciosugerido','prod.fecha_vencimiento','prod.stock','prod.descripcion','prod.imguno','prod.imgdos','prod.imgtres','prod.imgprincipal','ct.namecategoria','sub.namesubcategoria')
        ->where('emp.id', '=', Auth::user()->propietario->empresas->id)
        ->get();
        $pdf  =  PDF::loadView('productos_pyme.pdftotal', compact('productos', 'now'));
        set_time_limit(300);
        return  $pdf->download('Producto_Empresas.pdf');
    }
    public function total_productosPYI()
    {
        $now = Carbon::now();
        $productos = DB::table('users as u')
        ->join('propietarios as pro', 'pro.usuario_id','=','u.id')
        ->join('empresas as emp', 'emp.propietario_id', '=', 'pro.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->join('subcategorias as sub', 'prod.subcategoria_id', '=', 'sub.id')
        ->join('categorias as ct', 'sub.categoria_id', '=', 'ct.id')
        ->select('prod.id', 'emp.razonsocial', 'prod.nameproducto', 'prod.marca', 'prod.stock', 'prod.preciosugerido', 'prod.estado','prod.modelo','prod.genero','prod.alto','prod.ancho','prod.profundidad','prod.peso','prod.temperatura','prod.oferta','prod.preciosugerido','prod.fecha_vencimiento','prod.stock','prod.descripcion','prod.imguno','prod.imgdos','prod.imgtres','prod.imgprincipal','ct.namecategoria','sub.namesubcategoria')
        ->where('emp.id', '=', Auth::user()->propietario->empresas->id)
        ->get();

        $pdf  =  PDF::loadView('productos_pyme.pdftotal', compact('productos', 'now'));
        set_time_limit(300);
        return  $pdf->stream('total_producto.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companys = Empresa::all();
        $subcategorias = Subcategoria::all();
        $productos = Producto::all();
        $redes = Auth::user();
        return view('productos_pyme.create', compact('companys', 'subcategorias','redes','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nameproducto' => 'required',
            'preciosugerido' => 'required',
            'stock' => 'required',
            'imguno' => 'required',
            'imgdos' => 'required',
            'imgtres' => 'required',
            'imgprincipal' => 'required',
            'subcategoria_id' => 'required'
            // 'ncuentabanco' => ['unique:empresas,ncuentabanco'],
            // 'ncuentabancocci' => ['unique:empresas,ncuentabancocci'],
            // 'numerobilletera' => ['unique:empresas,numerobilletera']
        ]);
        
        if($request->hasFile('imguno')){
            $file = $request->file('imguno');
            $imguno = time().$file->getClientOriginalName();
            $file->move(public_path().'/images_product/', $imguno);
        }
        if($request->hasFile('imgdos')){
            $file = $request->file('imgdos');
            $imgdos = time().$file->getClientOriginalName();
            $file->move(public_path().'/images_product/', $imgdos);
        }
        if($request->hasFile('imgtres')){
            $file = $request->file('imgtres');
            $imgtres = time().$file->getClientOriginalName();
            $file->move(public_path().'/images_product/', $imgtres);
        }
        if($request->hasFile('imgprincipal')){
            $file = $request->file('imgprincipal');
            $imgprincipal = time().$file->getClientOriginalName();
            $file->move(public_path().'/images_product/', $imgprincipal);
        }

        $producto = new Producto();
        $producto->nameproducto = $request->input('nameproducto');
        $producto->slug = Str::slug($request->input('nameproducto'));
        $producto->marca = $request->input('marca');
        $producto->modelo = $request->input('modelo');
        $producto->genero = $request->input('genero');
        $producto->alto = $request->input('alto');
        $producto->ancho = $request->input('ancho');
        $producto->profundidad = $request->input('profundidad');
        $producto->peso = $request->input('peso');
        $producto->temperatura = $request->input('temperatura');
        $producto->oferta = $request->input('oferta');
        $producto->estado_oferta = 0;
        $producto->preciosugerido = $request->input('preciosugerido');
        $producto->fecha_vencimiento = $request->input('fecha_vencimiento');
        $producto->stock = $request->input('stock');
        $producto->nuevaoferta = (($request->input('preciosugerido'))-(($request->input('preciosugerido'))*(($request->input('oferta'))/100)));
        $producto->descripcion = $request->input('descripcion');
        $producto->imguno = $imguno;
        $producto->imgdos = $imgdos;
        $producto->imgtres = $imgtres;
        $producto->imgprincipal = $imgprincipal;
        $producto->estado = 'Pendiente';
        $producto->empresa_id = Auth::user()->propietario->empresas->id;
        $producto->subcategoria_id = $request->input('subcategoria_id');
        $producto->save();

        return redirect()->route('productos_pyme.index')->with('addproducto', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        $redes = Auth::user();
        return view('productos_pyme.show', compact('producto','redes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companys = Empresa::all();
        $subcategorias = Subcategoria::all();
        $producto = Producto::find($id);
        $now = Carbon::now();
        return view('productos_pyme.edit', compact('producto', 'companys', 'subcategorias','now'));
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
        $producto = Producto::find($id);
        $producto->fill($request->except('img-uno', 'img-dos', 'img-tres', 'img-principal','empresa_id', 'estado'));
        if($request->hasFile('img-uno')){
            $file = $request->file('img-uno');
            $imguno = time().$file->getClientOriginalName();
            $producto->imguno = $imguno;
            $file->move(public_path().'/images_product/', $imguno);
        }
        if($request->hasFile('img-dos')){
            $file = $request->file('img-dos');
            $imgdos = time().$file->getClientOriginalName();
            $producto->imgdos = $imgdos;
            $file->move(public_path().'/images_product/', $imgdos);
        }
        if($request->hasFile('img-tres')){
            $file = $request->file('img-tres');
            $imgtres = time().$file->getClientOriginalName();
            $producto->imgtres = $imgtres;
            $file->move(public_path().'/images_product/', $imgtres);
        }
        if($request->hasFile('img-principal')){
            $file = $request->file('img-principal');
            $imgprincipal = time().$file->getClientOriginalName();
            $producto->imgprincipal = $imgprincipal;
            $file->move(public_path().'/images_product/', $imgprincipal);
        }        
        $producto->update(['preciosugerido'=>$request->input('preciosugerido'),
                'estado'=>'Pendiente',
                'oferta'=>$request['oferta'],
                'estado_oferta' =>1,
                'nuevaoferta'=>(($request->input('preciosugerido'))-(($request->input('preciosugerido'))*(($request->input('oferta'))/100))),
               
            ]);        
        $producto->save();

        return redirect()->route('productos_pyme.index')->with('update', 'ok');
    }

    public function poferta(Request $request,$id)
    {
        // $oferta=Producto::where('id','=',$id)->firstOrFail()
        // ->update(['oferta'=>$request[input('oferta')],
        //          'fecha_vencimiento'=>$request[input('fecha_vencimiento')]]);
        //          $oferta->save();
                
        $producto = Producto::find($id);
        $producto->fill($request->except('img-uno', 'img-dos', 'img-tres', 'img-principal'));
        $producto->update(['preciosugerido'=>$request->input('preciosugerido'),
        'estado'=>'Pendiente',
        'oferta'=>$request['oferta'],
        'estado_oferta' =>1,
        'nuevaoferta'=>(($request->input('preciosugerido'))-(($request->input('preciosugerido'))*(($request->input('oferta'))/100))),
        
        ]);        
        $producto->save();
                //$oferta->save();   
                return redirect()->route('productos_pyme.index')->with('update', 'ok');     
            // $alfa= $request->all();
            // return $alfa;
            }
                /**

    
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $file_path = public_path().'/images_product'.$producto->imguno;
        File::delete($file_path);

        $file_pathdos = public_path().'/images_product'.$producto->imgdos;
        File::delete($file_pathdos);

        $file_pathtres = public_path().'/images_product'.$producto->imgtres;
        File::delete($file_pathtres);

        $file_pathprincipal = public_path().'/images_product'.$producto->imgprincipal;
        File::delete($file_pathprincipal);

        $producto->delete();

        return redirect()->route('productos_pyme.index')->with('delete', 'ok');
    }
}
