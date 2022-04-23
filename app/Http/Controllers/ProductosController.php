<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Subcategoria;
use App\Models\Empresa;
use Illuminate\Support\Facades\File;
use PDF;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Exports\ProductosExport;
use Maatwebsite\Excel\Facades\Excel;
class ProductosController extends Controller
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
    public function index(Request $request)
    { 
        $nombre = $request->get('buscarpor');
        $productos = Producto::where('estado', '!=', 'Pendiente')->orderByDesc('id')->get();
        return view('productos.index', compact('productos'));
    }
    public function exportP() 
    {
        return Excel::download(new ProductosExport, 'Total_Productos.xlsx');
    }
    public function por_productos($id)
    {
        $producto = Producto::find($id);
        $pdf  =  PDF::loadView('productos.pdfid', compact('producto'));
        set_time_limit(300);
        return  $pdf->download('itsolutionstuff.pdf');
    }
    public function total_productos()
    {
        $productos = Producto::all();
        $pdf  =  PDF::loadView('productos.pdftotal', compact('productos'));
        set_time_limit(300);
        return  $pdf->download('itsolutionstuff.pdf');
    }
    public function total_productosI()
    {
        $productos = Producto::all();
        $pdf  =  PDF::loadView('productos.pdftotal', compact('productos'));
        set_time_limit(300);
        return  $pdf->stream('itsolutionstuff.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companys = Empresa::all()->where('estadoemp', '=', 'Activo');
        $subcategorias = Subcategoria::all();

        return view('productos.create', compact('companys', 'subcategorias'));
    }


    public function listita(Request $request){

        $nombre = $request->get('buscarpor');
         $producto = DB::table('users as u')
        ->join('empresas as emp', 'emp.usuario_id', '=', 'u.id')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->select('prod.id', 'emp.razonsocial', 'prod.nameproducto','prod.imgprincipal','prod.marca', 'prod.stock', 'prod.preciosugerido', 'prod.estado')
        ->where('prod.estado', '=', 'Activo')
        ->where('prod.nameproducto','like',"%$nombre%")
        ->paginate(6);
        

        return view('productos.lista',compact('producto'));
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
        $estimatedate = \Carbon\Carbon::parse($request->input('fecha_vencimiento'))->format('Y-m-d');
        $producto = new Producto();
        $producto->nameproducto = $request->input('nameproducto');
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
        $producto->fecha_vencimiento = $estimatedate;
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

        return redirect()->route('productos.index')->with('addproducto', 'ok');
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
        return view('productos.show', compact('producto'));
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
        return view('productos.edit', compact('producto', 'companys', 'subcategorias'));
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

        return redirect()->route('productos.index')->with('update', 'ok');
    }
    public function oferta(Request $request,$id)
    {
        // $oferta=Producto::where('id','=',$id)->firstOrFail()
        // ->update(['oferta'=>$request[input('oferta')],
        //          'fecha_vencimiento'=>$request[input('fecha_vencimiento')]]);
        //          $oferta->save();
                
                $oferta = DB::table('productos')->where('id', $id);
                $oferta->update(['oferta'=>$request['oferta'],
                'fecha_vencimiento'=>$request['fecha_vencimiento'],
                ]); 
                //$oferta->save();   
                return redirect()->route('productos.index')->with('update', 'ok');     
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

        return redirect()->route('productos.index')->with('delete', 'ok');
    }
}
