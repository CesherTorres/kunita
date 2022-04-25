<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Empresa;
use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use  PDF;
use App\Exports\ProductoEmpreExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
class ProductosAsesorController extends Controller
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
        ->join('empresas as emp', 'emp.usuario_id', '=', 'u.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->select('prod.id', 'emp.razonsocial', 'prod.nameproducto', 'prod.marca', 'prod.stock', 'prod.preciosugerido', 'prod.estado')
        ->where('u.id', '=', Auth::user()->id)
        ->where('prod.estado', '!=', 'Pendiente')
        ->get();
        // $productos = Producto::all()->where('estado', 'Activo')->where('empresa_id', );
        return view('productos_asesor.index', compact('productos'));
    }
    public function exportPA() 
    {
        return Excel::download(new ProductoEmpreExport, 'Total_Productos.xlsx');
    }
    public function por_productosA($id)
    {
        $now = Carbon::now();
        $producto = Producto::find($id);
        
        $pdf  =  PDF::loadView('productos_asesor.pdfid', compact('producto', 'now'));
        set_time_limit(300);
        return  $pdf->download('itsolutionstuff.pdf');
    }
    public function total_productosA()
    {
        $now = Carbon::now();
        $productos = DB::table('users as u')
        ->join('empresas as emp', 'emp.usuario_id', '=', 'u.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->join('subcategorias as sub', 'prod.subcategoria_id', '=', 'sub.id')
        ->join('categorias as ct', 'sub.categoria_id', '=', 'ct.id')
        ->select('prod.id', 'emp.razonsocial', 'prod.nameproducto', 'prod.marca', 'prod.stock', 'prod.preciosugerido', 'prod.estado','prod.modelo','prod.genero','prod.alto','prod.ancho','prod.profundidad','prod.peso','prod.temperatura','prod.oferta','prod.preciosugerido','prod.fecha_vencimiento','prod.stock','prod.descripcion','prod.imguno','prod.imgdos','prod.imgtres','prod.imgprincipal','ct.namecategoria','sub.namesubcategoria')
        ->where('u.id', '=', Auth::user()->id)
        ->where('prod.estado', '=', 'Activo')
        ->get();
        $pdf  =  PDF::loadView('productos_asesor.pdftotal', compact('productos', 'now'));
        set_time_limit(300);
        return  $pdf->setPaper('a4', 'landscape')->download('total_producto.pdf');
    }
    public function total_productosI()
    { 
        $now = Carbon::now();
        $productos = DB::table('users as u')
        ->join('empresas as emp', 'emp.usuario_id', '=', 'u.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->join('subcategorias as sub', 'prod.subcategoria_id', '=', 'sub.id')
        ->join('categorias as ct', 'sub.categoria_id', '=', 'ct.id')
        ->select('prod.id', 'emp.razonsocial', 'prod.nameproducto', 'prod.marca', 'prod.stock', 'prod.preciosugerido', 'prod.estado','prod.modelo','prod.genero','prod.alto','prod.ancho','prod.profundidad','prod.peso','prod.temperatura','prod.oferta','prod.preciosugerido','prod.fecha_vencimiento','prod.stock','prod.descripcion','prod.imguno','prod.imgdos','prod.imgtres','prod.imgprincipal','ct.namecategoria','sub.namesubcategoria')
        ->where('u.id', '=', Auth::user()->id)
        ->where('prod.estado', '=', 'Activo')
        ->get();

        $pdf  =  PDF::loadView('productos_asesor.pdftotal', compact('productos', 'now'));
        set_time_limit(300);
        return  $pdf->setPaper('a4', 'landscape')->stream('total_producto.pdf');
    }

    public function listitaA(Request $request){
        $nombre = $request->get('buscarpor');
         $producto = DB::table('users as u')
        ->join('empresas as emp', 'emp.usuario_id', '=', 'u.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->select('prod.id', 'emp.razonsocial', 'prod.nameproducto','prod.imgprincipal','prod.marca', 'prod.stock', 'prod.preciosugerido', 'prod.estado')
        ->where('u.id', '=', Auth::user()->id)
        ->where('prod.estado', '=', 'Activo')
        ->where('prod.nameproducto','like',"%$nombre%")
        ->paginate(6);
        return view('productos_asesor.listaA',compact('producto'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companys = Empresa::all()->where('usuario_id',  Auth::user()->id)->where('estadoemp', '=', 'Activo');
        $productos = Producto::all()->where('estado','Activo');
        $subcategorias = Subcategoria::all();

        return view('productos_asesor.create', compact('companys', 'subcategorias','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->hasFile('img-uno')){
            $file = $request->file('img-uno');
            $imguno = time().$file->getClientOriginalName();
            $file->move(public_path().'/images_product/', $imguno);
        }
        if($request->hasFile('img-dos')){
            $file = $request->file('img-dos');
            $imgdos = time().$file->getClientOriginalName();
            $file->move(public_path().'/images_product/', $imgdos);
        }
        if($request->hasFile('img-tres')){
            $file = $request->file('img-tres');
            $imgtres = time().$file->getClientOriginalName();
            $file->move(public_path().'/images_product/', $imgtres);
        }
        if($request->hasFile('img-principal')){
            $file = $request->file('img-principal');
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
        $producto->estado_oferta = $request->input('estado_oferta');
        $producto->preciosugerido = $request->input('preciosugerido');
        $producto->nuevaoferta = (($request->input('preciosugerido'))-(($request->input('preciosugerido'))*(($request->input('oferta'))/100)));
        $producto->fecha_vencimiento = $request->input('fecha_vencimiento');
        $producto->stock = $request->input('stock');
        $producto->descripcion = $request->input('descripcion');
        $producto->imguno = $imguno;
        $producto->imgdos = $imgdos;
        $producto->imgtres = $imgtres;
        $producto->imgprincipal = $imgprincipal;
        $producto->estado = 'Activo';
        $producto->empresa_id = $request->input('empresa_id');
        $producto->subcategoria_id = $request->input('subcategoria_id');
        $producto->save();

        return redirect()->route('productos_asesor.index')->with('addproducto', 'ok');
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
        return view('productos_asesor.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companys = Empresa::all()->where('usuario_id',  Auth::user()->id);
        $subcategorias = Subcategoria::all();
        $producto = Producto::find($id);
        return view('productos_asesor.edit', compact('producto', 'companys', 'subcategorias'));
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
        $producto->fill($request->except('img-uno', 'img-dos', 'img-tres', 'img-principal'));
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
                'oferta'=>$request['oferta'],
                'estado_oferta' =>$request['estado_oferta']?1:0,
                'nuevaoferta'=>(($request->input('preciosugerido'))-(($request->input('preciosugerido'))*(($request->input('oferta'))/100))),
               
            ]);   
        $producto->save();
        
        return redirect()->route('productos_asesor.index')->with('update', 'ok');
    }

    public function aoferta(Request $request,$id)
    {
        // $oferta=Producto::where('id','=',$id)->firstOrFail()
        // ->update(['oferta'=>$request[input('oferta')],
        //          'fecha_vencimiento'=>$request[input('fecha_vencimiento')]]);
        //          $oferta->save();
                
            $producto = Producto::find($id);
                $producto->fill($request->except('img-uno', 'img-dos', 'img-tres', 'img-principal'));
                $producto->update(['preciosugerido'=>$request->input('preciosugerido'),
                'oferta'=>$request['oferta'],
                'estado_oferta' =>1,
                'nuevaoferta'=>(($request->input('preciosugerido'))-(($request->input('preciosugerido'))*(($request->input('oferta'))/100))),
            
            ]);        
            $producto->save();
                //$oferta->save();   
                return redirect()->route('productos_asesor.index')->with('update', 'ok');     
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

        return redirect()->route('productos_asesor.index')->with('delete', 'ok');
    }
}
