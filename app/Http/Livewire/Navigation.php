<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Producto;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;
class Navigation extends Component
{
    public function render()
    {
        $productos = Producto::all()->where('estado','Activo')->sortByDesc('nameproducto')->take(10);
        $ofertas =  Producto::all()->where('oferta','>=', 20)->where('estado','Activo')->take(12);
        $empresass = Empresa::all();
        $categorias = Categoria::all();
        return view('livewire.navigation', compact('categorias','empresass','productos','ofertas'));
    }
}
