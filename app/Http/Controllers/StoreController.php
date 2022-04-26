<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Subcategoria;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Empresa;
use App\Models\Publicidad;
use App\Models\Ubigeo;
use App\Models\Cobertura;
use Session;
use Illuminate\Support\Str;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categorias = Categoria::all();
        // $subcategorias = Subcategoria::all();
        // // $productos =  DB::table('productos')
        // // ->select('productos')
        // // $subcategorias =  DB::table('subcategorias as sb')
        // // ->join('categorias as c', 'sb.categoria_id', '=', 'c.id')
        // // ->select()
        // // ->where()
        // // ->get();
        // return view('store.store', compact('subcategorias', 'categorias'));
    }
    public function despachando(){
        $categorias = Categoria::all();
        $ubigeo = DB::table('ubigeoperu as up')
            ->select('up.id', 'up.departamento', 'up.provincia', 'up.distrito', 'up.ubigeo')
            ->get();
        return view('store.despachos', compact('ubigeo','categorias'));
    }
    public function Pedido_realizado(){
        $categorias = Categoria::all();
        $ubigeo = DB::table('ubigeoperu as up')
            ->select('up.id', 'up.departamento', 'up.provincia', 'up.distrito', 'up.ubigeo')
            ->get();
        return view('store.pedido_realizado', compact('ubigeo','categorias'));
    }
    public function storeempresas()
    {
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::all();
        $productos = DB::table('empresas as emp')
        ->join('giros as g', 'g.id','=','emp.giro_id')
            ->join('productos as pro', 'pro.empresa_id','=','emp.id')
            ->select('emp.logoempresa','emp.marca','emp.enlacefacebook', 'g.namegiros', 'emp.enlaceinstagram','emp.enlacewhatsapp','emp.direccion','pro.id','emp.slug')
            ->where('emp.estadoemp', 'Activo')
            ->get()->unique('marca');
        $companys= Empresa::where('estadoemp', 'Activo');
        // $producto = Producto::all()->unique('empresa_id');
        return view('empresas.storeempresas', compact('companys', 'categorias', 'subcategorias','productos'));
    }
    public function jalandoproduct(Request $request)
    {
        $data=[];
        $productos = Producto::where('subcategoria_id','=',$request->subcategoria_id)
        ->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto'=>$producto,
                'producto_id'=>$producto->id,
                'slug'=>$producto->slug,
                'nameproducto'=>$producto->nameproducto,
                'oferta'=>$producto->oferta,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'empresa_id' =>$producto->empresa->id,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        return response()->json(['productos'=>$data]);

        // $productos = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.nuevaoferta','emp.razonsocial','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.id as idcobertura','cob.precioenvio','cob.diasestimados','cob.ubigeocobertura_id')
        // ->where('subcategoria_id','=',$request->subcategoria_id)->where('estado', 'Activo')->take(10)->get();
        // return response(json_encode($productos),200);
    }
    public function prodemp(Request $request)
    {
        $data=[];
        $productos = Producto::where('subcategoria_id','=',$request->subcategoria_id)->where('empresa_id','=',$request->empresa_id)
        ->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto'=>$producto,
                'producto_id'=>$producto->id,
                'slug'=>$producto->slug,
                'nameproducto'=>$producto->nameproducto,
                'oferta'=>$producto->oferta,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'empresa_id' =>$producto->empresa->id,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        return response()->json(['productos'=>$data]);
        // $productos = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.nuevaoferta','emp.razonsocial','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.id as idcobertura','cob.precioenvio','cob.diasestimados','cob.ubigeocobertura_id')
        // ->where('pro.subcategoria_id','=',$request->subcategoria_id)
        // ->where('pro.empresa_id','=',$request->empresa_id)
        // ->where('pro.estado','Activo')->take(12)->orderByDesc('pro.id')->get();
        // return response(json_encode($productos),200);
    }
    public function prodmarc(Request $request)
    {
        $data=[];
        $productos = Producto::where('subcategoria_id','=',$request->subcategoria_id)->where('marca','=',$request->marca)->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto'=>$producto,
                'producto_id'=>$producto->id,
                'slug'=>$producto->slug,
                'nameproducto'=>$producto->nameproducto,
                'oferta'=>$producto->oferta,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'empresa_id' =>$producto->empresa->id,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        return response()->json(['productos'=>$data]);
        // $productos = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.nuevaoferta','emp.razonsocial','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.id as idcobertura','cob.precioenvio','cob.diasestimados','cob.ubigeocobertura_id')
        // ->where('pro.subcategoria_id','=',$request->subcategoria_id)
        // ->where('pro.marca','=',$request->marca)
        // ->where('pro.estado','Activo')->take(12)->orderByDesc('pro.id')->get();
        // return response(json_encode($productos),200);  
    }
    public function modelomarc(Request $request)
    {
        $data=[];
        $productos = Producto::where('subcategoria_id','=',$request->subcategoria_id)
        ->where('modelo','=',$request->modelo)
        ->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto'=>$producto,
                'producto_id'=>$producto->id,
                'nameproducto'=>$producto->nameproducto,
                'oferta'=>$producto->oferta,
                'slug'=>$producto->slug,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'empresa_id' =>$producto->empresa->id,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        return response()->json(['productos'=>$data]);
        // $productos = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.nuevaoferta','emp.razonsocial','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.id as idcobertura','cob.precioenvio','cob.diasestimados','cob.ubigeocobertura_id')
        // ->where('pro.subcategoria_id','=',$request->subcategoria_id)
        // ->where('pro.modelo','=',$request->modelo)
        // ->where('pro.estado','Activo')->take(12)->orderByDesc('pro.id')->get();
        // return response(json_encode($productos),200);  
    }
    public function precimarc(Request $request)
    {
        $data=[];
        $productos = Producto::where('subcategoria_id','=',$request->subcategoria_id)
        ->where('nuevaoferta','=',$request->nuevaoferta)
        ->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto'=>$producto,
                'producto_id'=>$producto->id,
                'nameproducto'=>$producto->nameproducto,
                'oferta'=>$producto->oferta,
                'slug'=>$producto->slug,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'empresa_id' =>$producto->empresa->id,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        return response()->json(['productos'=>$data]);
        // $productos = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.nuevaoferta','emp.razonsocial','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.id as idcobertura','cob.precioenvio','cob.diasestimados','cob.ubigeocobertura_id')
        // ->where('pro.subcategoria_id','=',$request->subcategoria_id)
        // ->where('pro.nuevaoferta','=',$request->nuevaoferta)
        // ->where('pro.estado','Activo')->take(12)->orderByDesc('pro.id')->get();
        // return response(json_encode($productos),200);  
    }
    public function genemarc(Request $request)
    {
        $data=[];
        $productos = Producto::where('subcategoria_id','=',$request->subcategoria_id)
        ->where('genero','=',$request->genero)
        ->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto'=>$producto,
                'producto_id'=>$producto->id,
                'nameproducto'=>$producto->nameproducto,
                'oferta'=>$producto->oferta,
                'slug'=>$producto->slug,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'empresa_id' =>$producto->empresa->id,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        return response()->json(['productos'=>$data]);
        // return response()->json(['productos'=>$data]);
        // $productos = DB::table('subcategorias as sub')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.nuevaoferta','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','pro.ancho','pro.profundidad','pro.peso','pro.alto')
        // ->where('pro.subcategoria_id','=',$request->subcategoria_id)
        // ->where('pro.genero','=',$request->genero)
        // ->where('pro.estado','Activo')->get();
        // return response(json_encode($productos),200);  
    }
    public function ofermarc(Request $request)
    {
        $data=[];
        $productos = Producto::where('subcategoria_id','=',$request->subcategoria_id)
        ->where('oferta','=',$request->oferta)
        ->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto'=>$producto,
                'producto_id'=>$producto->id,
                'nameproducto'=>$producto->nameproducto,
                'oferta'=>$producto->oferta,
                'slug'=>$producto->slug,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'empresa_id' =>$producto->empresa->id,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        return response()->json(['productos'=>$data]);

        // $productos = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.nuevaoferta','emp.razonsocial','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.id as idcobertura','cob.precioenvio','cob.diasestimados','cob.ubigeocobertura_id')
        // ->where('pro.subcategoria_id','=',$request->subcategoria_id)
        // ->where('pro.oferta','=',$request->oferta)
        // ->where('pro.estado','Activo')->take(12)->orderByDesc('pro.id')->get();
        // return response(json_encode($productos),200);  
    }
    public function tiendakunaq()
    {
        $productitoto = Producto::all()->where('estado','Activo')->take(10)->sortByDesc('id');
        // $productos = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.descripcion','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.nuevaoferta','emp.razonsocial','pro.empresa_id','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.precioenvio','cob.diasestimados','cob.ubigeocobertura_id','emp.id as idempresas')->where('pro.estado','Activo')->take(10)->orderByDesc('pro.id')->get();
        // $productosss = Producto::all()->where('estado','Activo')->sortByDesc('nameproducto')->take(10);
        $productitoOfer = Producto::all()->where('estado_oferta',1)->where('oferta','>=', 5)->where('estado','Activo')->take(12)->sortByDesc('id');
        // $ofertas = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.nuevaoferta','emp.razonsocial','emp.correoempresa','emp.telefonoempresa','pro.empresa_id','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.precioenvio','cob.diasestimados','cob.ubigeocobertura_id')->where('oferta','>=', 5)->where('pro.estado','Activo')->take(12)->orderByDesc('pro.id')->get();

        // $ofertas =  Producto::all()->where('oferta','>=', 20)->where('estado','Activo')->take(12);
        $empresass = Empresa::all();
        $categorias = Categoria::all();

        $publicidad = DB::table('publicidads as pub')
        ->select('pub.imagen','pub.enlace')
        ->where('pub.tipo', '=', 'Slider')
        ->orderByDesc('pub.id')
        ->take(6)
        ->get();
        return view('store.store', compact('categorias','empresass', 'publicidad','productitoto','productitoOfer'));
    }
    public function cart()  {
        $cartCollection = \Cart::getContent();
        return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);
    }
    public function add(Request $request) {
        if(Session::has('empresa_id')){ //para saber si la sesion existe
            $empresa=session('empresa_id');
            if($empresa != $request->empresa_id){
                return redirect()->back()->with('info','informacion');
            }
        }else{
            session(['empresa_id' => $request->empresa_id]);
        }
        \Cart::add(array(
            'id' => $request->id,
            'nameproducto' => $request->name,
            'nuevaoferta' => $request->price,
            'razonsocial' => $request->razonsocial,
            'empresa_id' => $request->empresa_id,
            'idcobertura' => $request->idcobertura,
            'precioenvio' => $request->precioenvio,
            'diasestimados' => $request->diasestimados,
            'ubigeocobertura_id' => $request->ubigeocobertura_id,
            'quantity' => $request->quantity,
            'attributes' => array(
                'imgprincipal' => $request->img,
            )
        )
            );
            
          return redirect()->back()->with('addprod','ok');
        }
        public function UpdateCobertura(Request $request){
            $coberturas = Cobertura::where('ubigeocobertura_id',$request->id)->where('empresa_id',$request->empresa_id)->first();
            $cartCollection = \Cart::getContent();
            foreach($cartCollection as $key => $item){
                if($coberturas){
                        $cartCollection[$key]['precioenvio']=$coberturas->precioenvio;
                    }else{
                        $cartCollection[$key]['precioenvio']=0;
                    }
                }
            return response()->json(['empresa' => $coberturas]);
        }
        public function UpdateQuantity(Request $request){
            $carrito = \Cart::getContent();
            $total=0;
                foreach($carrito as $key => $item){
                    if($key == $request->key){
                        $carrito[$key]['quantity']=$request->quantity;
                        $carrito[$key]['nuevaoferta']=$request->nuevaoferta;
                    }
                    $subtotal=floatval($item->price)*intval($item->quantity);
                    $total+=$subtotal;
                }
            return response()->json(['total'=>$total]);
        }
        public function remove(Request $request, $id){
            \Cart::remove($request->id);
            return redirect()->route('index.tienda')->with('success_msg', 'Item is removed!');
        }
        public function removeC(Request $request, $id){
            \Cart::remove($request->id);
            return redirect()->route('compra.carrito')->with('success_msg', 'Item is removed!');
        }
        public function updates(Request $request){
            \Cart::update($request->id,
                array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $request->quantity
                    ),
            ));
            return redirect()->route('index.tienda')->with('success_msg', 'Cart is Updated!');
        }
        public function updatesC(Request $request){
            \Cart::update($request->id,
                array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $request->quantity
                    ),
            ));
            return redirect()->route('index.tienda')->with('success_msg', 'Cart is Updated!');
        }
        public function clear(){
            \Cart::clear();
            session::forget('empresa_id');
            return redirect()->route('index.tienda')->with('success_msg', 'Car is cleared!');
        }
    public function shop_pro()
    {
        return view('cliente.productos.index');
    }

    public function showSub(Request $request, Subcategoria $slug)
    {
        $subcategorias = Subcategoria::find($slug->id);
        $empresas = DB::table('empresas as emp')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->select('emp.id','emp.razonsocial')
        ->distinct()
        ->where('prod.subcategoria_id','=',$subcategorias->id)
        ->get();

        $marcas = DB::table('productos as p')
        ->select('p.marca')
        ->distinct()
        ->where('p.subcategoria_id','=',$subcategorias->id)
        ->get();

        $modelos = DB::table('productos as p')
        ->select('p.modelo')
        ->distinct()
        ->where('p.subcategoria_id','=',$subcategorias->id)
        ->get();

        $precios = DB::table('productos as p')
        ->select('p.nuevaoferta')
        ->distinct()
        ->where('p.subcategoria_id','=',$subcategorias->id)
        ->get();

        $generos = DB::table('productos as p')
        ->select('p.genero')
        ->distinct()
        ->where('p.subcategoria_id','=',$subcategorias->id)
        ->get();

        $ofertas = DB::table('productos as p')
        ->select('p.oferta')
        ->distinct()
        ->where('p.oferta', '!=', '')
        ->where('p.subcategoria_id','=',$subcategorias->id)
        ->get();

        $categorias = Categoria::all();
        $productos = Producto::where('subcategoria_id','=',$subcategorias->id)->where('estado', 'Activo')->latest('id')->paginate(12);

        return view('store.producStore', compact('productos','subcategorias','empresas', 'categorias', 'marcas', 'modelos', 'precios', 'generos', 'ofertas'));
    }
    public function EmpresasProducto(Empresa $slug)
    {
        $categorias = Categoria::all();
        $producti= Empresa::find($slug->id);
        //$producti= Producto::find($producto->empresa_id);
        // $productito = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.descripcion','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.nuevaoferta','emp.razonsocial','pro.empresa_id','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.precioenvio','cob.diasestimados','cob.ubigeocobertura_id')->where('pro.estado','Activo')->where('pro.empresa_id',$producto->empresa_id)->orderByDesc('pro.id')->get();

        $empresas = DB::table('empresas as emp')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->join('subcategorias as sc', 'sc.id', '=', 'prod.subcategoria_id')
        ->select('emp.id','emp.razonsocial')
        ->where('emp.id','=',$producti->id)
        ->where('prod.estado','Activo')
        ->distinct()
        ->get();

        $categoriasss = DB::table('empresas as emp')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->join('subcategorias as sc', 'sc.id', '=', 'prod.subcategoria_id')
        ->select('sc.id','sc.namesubcategoria')
        ->distinct()
        ->where('emp.id','=',$producti->id)
        ->where('prod.estado','Activo')
        ->get();

        $marcas = DB::table('empresas as emp')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->select('prod.id','prod.marca')
        ->distinct()
        ->where('emp.id','=',$producti->id)
        ->where('prod.estado','Activo')
        ->get()->unique(['marca']);

        $modelos = DB::table('productos as p')
        ->join('empresas as emp','p.empresa_id','=','emp.id')
        ->select('p.id','p.modelo')
        ->distinct()
        ->where('emp.id','=',$producti->id)
        ->where('p.estado','Activo')
        ->get()->unique(['modelo']);;

        $precios = DB::table('productos as p')
        ->join('empresas as emp','p.empresa_id','=','emp.id')
        ->select('p.id','p.nuevaoferta')
        ->distinct()
        ->where('emp.id','=',$producti->id)
        ->where('p.estado','Activo')
        ->get()->unique(['nuevaoferta']);;
        

        $ofertas = DB::table('productos as p')
        ->select('p.oferta','p.id')
        ->distinct()
        ->where('empresa_id','=',$producti->id)
        ->where('p.estado','Activo')
        ->get()->unique(['oferta']);;

        $productos = Producto::all();
        return view('store.productosAsociados', compact('categoriasss','categorias','empresas','marcas','modelos','precios','ofertas','producti','productos'));
    }
    public function EmpresasAll(Producto $slug)
    {
        $categorias = Categoria::all();
        $producti= Producto::find($slug->id);
        //$producti= Producto::find($producto->empresa_id);
        // $productito = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.descripcion','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.nuevaoferta','emp.razonsocial','pro.empresa_id','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.precioenvio','cob.diasestimados','cob.ubigeocobertura_id')->where('pro.estado','Activo')->where('pro.empresa_id',$producto->empresa_id)->orderByDesc('pro.id')->get();

        $empresas = DB::table('empresas as emp')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->join('subcategorias as sc', 'sc.id', '=', 'prod.subcategoria_id')
        ->select('emp.id','emp.razonsocial')
        ->where('emp.id','=',$producti->empresa_id)
        ->where('prod.estado','Activo')
        ->distinct()
        ->get();

        $categoriasss = DB::table('empresas as emp')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->join('subcategorias as sc', 'sc.id', '=', 'prod.subcategoria_id')
        ->select('sc.id','sc.namesubcategoria')
        ->distinct()
        ->where('emp.id','=',$producti->empresa_id)
        ->where('prod.estado','Activo')
        ->get();

        $marcas = DB::table('empresas as emp')
        ->join('productos as prod', 'prod.empresa_id', '=', 'emp.id')
        ->select('prod.id','prod.marca')
        ->distinct()
        ->where('emp.id','=',$producti->empresa_id)
        ->where('prod.estado','Activo')
        ->get()->unique(['marca']);

        $modelos = DB::table('productos as p')
        ->join('empresas as emp','p.empresa_id','=','emp.id')
        ->select('p.id','p.modelo')
        ->distinct()
        ->where('emp.id','=',$producti->empresa_id)
        ->where('p.estado','Activo')
        ->get()->unique(['modelo']);;

        $precios = DB::table('productos as p')
        ->join('empresas as emp','p.empresa_id','=','emp.id')
        ->select('p.id','p.nuevaoferta')
        ->distinct()
        ->where('emp.id','=',$producti->empresa_id)
        ->where('p.estado','Activo')
        ->get()->unique(['nuevaoferta']);;
        

        $ofertas = DB::table('productos as p')
        ->select('p.oferta','p.id')
        ->distinct()
        ->where('empresa_id','=',$producti->empresa_id)
        ->where('p.estado','Activo')
        ->get()->unique(['oferta']);;

        $productos = Producto::all();
        return view('store.productosempre', compact('categoriasss','categorias','empresas','marcas','modelos','precios','ofertas','producti','productos'));
    }
    public function jalandoproductEmpresas(Request $request)
    {
        
        $data=[];
        $productos = Producto::where('empresa_id',$request->empresa_ids)
        ->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto_id'=>$producto->id,
                'nameproducto'=>$producto->nameproducto,
                'slug'=>$producto->slug,
                'oferta'=>$producto->oferta,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'empresa_id' =>$producto->empresa->id,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        return response()->json(['productos'=>$data]);
    }
    public function prodempEmpresas(Request $request)
    {
        $data=[];
        $productos = Producto::where('empresa_id',$request->empresa_id)->where('subcategoria_id',$request->categoria_id)
        ->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto_id'=>$producto->id,
                'nameproducto'=>$producto->nameproducto,
                'oferta'=>$producto->oferta,
                'slug'=>$producto->slug,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'empresa_id' =>$producto->empresa->id,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        return response()->json(['productos'=>$data]);
        // $productos = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.empresa_id','pro.nuevaoferta','emp.razonsocial','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.precioenvio','cob.diasestimados','cob.id as idcobertura','cob.ubigeocobertura_id')
        // ->where('pro.empresa_id','=',$request->empresa_id)
        // ->where('sub.id','=',$request->categoria_id)
        // ->where('pro.estado','Activo')->take(12)->orderByDesc('pro.id')->get();
        // return response()->json(['productos'=>$data]);
    }
    public function prodmarcEmpresas(Request $request)
    {
        $data=[];
        $productos = Producto::where('empresa_id',$request->empresa_id)->where('marca',$request->marca)
        ->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto_id'=>$producto->id,
                'nameproducto'=>$producto->nameproducto,
                'oferta'=>$producto->oferta,
                'slug'=>$producto->slug,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'empresa_id' =>$producto->empresa->id,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        return response()->json(['productos'=>$data]);
        // $productos = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.empresa_id','pro.nuevaoferta','emp.razonsocial','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.precioenvio','cob.diasestimados','cob.id as idcobertura','cob.ubigeocobertura_id')
        // ->where('pro.empresa_id','=',$request->empresa_id)
        // ->where('pro.id','=',$request->marca)
        // ->where('pro.estado','Activo')->take(12)->orderByDesc('pro.id')->get();
        // return response(json_encode($productos),200);  
    }
    public function modelomarcEmpresas(Request $request)
    {
        $data=[];
        $productos = Producto::where('empresa_id',$request->empresa_id)->where('modelo','=',$request->modelo)
        ->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto_id'=>$producto->id,
                'nameproducto'=>$producto->nameproducto,
                'oferta'=>$producto->oferta,
                'slug'=>$producto->slug,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'empresa_id' =>$producto->empresa->id,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        // $productos = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.empresa_id','pro.nuevaoferta','emp.razonsocial','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.precioenvio','cob.diasestimados','cob.id as idcobertura','cob.ubigeocobertura_id')
        // ->where('pro.empresa_id','=',$request->empresa_id)
        // ->where('pro.id','=',$request->modelo)
        // ->where('pro.estado','Activo')->take(12)->orderByDesc('pro.id')->get();
        return response()->json(['productos'=>$data]);  
    }
    public function precimarcEmpresas(Request $request)
    {
        $data=[];
        $productos = Producto::where('empresa_id',$request->empresa_id)->where('nuevaoferta',$request->nuevaoferta)
        ->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto_id'=>$producto->id,
                'nameproducto'=>$producto->nameproducto,
                'oferta'=>$producto->oferta,
                'slug'=>$producto->slug,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'empresa_id' =>$producto->empresa->id,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        // $productos = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.empresa_id','pro.nuevaoferta','emp.razonsocial','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.precioenvio','cob.diasestimados','cob.id as idcobertura','cob.ubigeocobertura_id')
        // ->where('pro.empresa_id','=',$request->empresa_id)
        // ->where('pro.id','=',$request->nuevaoferta)
        // ->where('pro.estado','Activo')->take(12)->orderByDesc('pro.id')->get();
        return response()->json(['productos'=>$data]);  
    }
    public function genemarcEmpresas(Request $request)
    {
        $data=[];
        $productos = Producto::where('empresa_id',$request->empresa_id)->where('genero','=',$request->genero)
        ->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto_id'=>$producto->id,
                'nameproducto'=>$producto->nameproducto,
                'oferta'=>$producto->oferta,
                'slug'=>$producto->slug,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'empresa_id' =>$producto->empresa->id,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        return response()->json(['productos'=>$data]);
        // $productos = DB::table('subcategorias as sub')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.empresa_id','pro.nuevaoferta','emp.razonsocial','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.precioenvio','cob.diasestimados','cob.id as idcobertura','cob.ubigeocobertura_id')
        // ->where('pro.empresa_id','=',$request->empresa_id)
        // ->where('pro.id','=',$request->genero)
        // ->where('pro.estado','Activo')->get();
        //return response(json_encode($productos),200);  
    }
    public function ofermarcEmpresas(Request $request)
    {
        $data=[];
        $productos = Producto::where('empresa_id',$request->empresa_id)->where('oferta','=',$request->oferta)
        ->where('estado', 'Activo')->take(10)->get();
        
        foreach($productos as $producto){
            $producto->has_offer();
            $data[]=[
                'producto_id'=>$producto->id,
                'nameproducto'=>$producto->nameproducto,
                'oferta'=>$producto->oferta,
                'slug'=>$producto->slug,
                'preciosugerido'=>$producto->preciosugerido,
                'imgprincipal'=>$producto->imgprincipal,
                'nuevaoferta' =>$producto->nuevaoferta,
                'empresa_id' =>$producto->empresa->id,
                'marca' =>$producto->marca,
                'estado_oferta' =>$producto->estado_oferta,
                'razonsocial' =>$producto->empresa->razonsocial,
                'cobertura_id'=>$producto->empresa->cobertura()->id,
                'precioEnvio_id' =>$producto->empresa->cobertura()->precioenvio,
                'diasestimados_id' =>$producto->empresa->cobertura()->diasestimados,
                'ubigeocobertura_id' =>$producto->empresa->cobertura()->ubigeocobertura_id
            ];
        }
        // $productos = DB::table('categorias as cat')
        // ->join('subcategorias as sub','cat.id','=','sub.categoria_id')
        // ->join('productos as pro','pro.subcategoria_id','=','sub.id')
        // ->join('empresas as emp','emp.id','=','pro.empresa_id')
        // ->join('coberturas as cob','cob.empresa_id','=','emp.id')
        // ->select('pro.imgprincipal','pro.oferta','pro.preciosugerido','pro.nameproducto','pro.marca','pro.id','pro.empresa_id','pro.nuevaoferta','emp.razonsocial','emp.correoempresa','emp.telefonoempresa','pro.imguno','pro.imgdos','pro.imgtres','pro.modelo','pro.genero','cat.namecategoria','sub.namesubcategoria','pro.ancho','pro.profundidad','pro.peso','pro.alto','cob.precioenvio','cob.diasestimados','cob.id as idcobertura','cob.ubigeocobertura_id')
        // ->where('pro.empresa_id','=',$request->empresa_id)
        // ->where('pro.id','=',$request->oferta)
        // ->where('pro.estado','Activo')->take(12)->orderByDesc('pro.id')->get();
        return response()->json(['productos'=>$data]);  
    }
    // public function empresas(Request $request, $id)
    // {
    //     $empresas = Empresa::find($id);
    //     $productos = Producto::where('empresa_id','=',$empresas->id)->where('estado', 'Activo')
    //     ->latest('id')
    //     ->paginate(12); 
    //     return view('store.empresas', compact('productos', 'category', 'marcas', 'categorias'));
    // }

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
