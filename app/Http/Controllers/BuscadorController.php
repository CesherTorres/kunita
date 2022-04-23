<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;

class BuscadorController extends Controller
{
    public function __invoke(Request $request)
    {

        $buscarpor =  $request->buscarpor;
        $productos = Producto::where('nameproducto', 'LIKE', '%' . $buscarpor . '%')->where('estado', 'Activo')->paginate(8);
        $categorias = Categoria::all();
        return view('store.buscar', compact('categorias', 'productos', 'buscarpor'));
    }
}
