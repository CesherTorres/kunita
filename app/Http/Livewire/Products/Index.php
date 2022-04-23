<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Subcategoria;

use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    public $prodPage=16;

    public $searchmodel;

    public $searchTerm;
    public $filters=['subcategorias'=>[],
    ];

    public $min_precio;
    public $max_precio;

    public $inicio_min;
    public $inicio_max;

    public function mount(){
        $this->min_precio = Producto::min('preciosugerido');
        $this->max_precio = Producto::max('preciosugerido');

        $this->inicio_min = Producto::min('preciosugerido');
        $this->inicio_max = Producto::max('preciosugerido');
    }



    public function getSubcategoriasProperty()
    {
        $searchTerm = '%' .$this->searchTerm. '%';
        return Subcategoria::where('namesubcategoria','like',$searchTerm)->get();
    }
    public function getResultsProperty()
    {
        $this->filters['subcategorias']= array_filter($this->filters['subcategorias']);
        if(empty($this->filters['subcategorias'])){
            return Producto::
            whereBetween('preciosugerido',[$this->min_precio, $this->max_precio])
            ->paginate($this->prodPage);
        }
        
        return Producto::whereIn('subcategoria_id',array_keys($this->filters['subcategorias']))
        ->whereBetween('preciosugerido',[$this->min_precio, $this->max_precio])
        ->paginate($this->prodPage);
    }
    public function render()
    {
        // $productos = Producto::paginate($this->prodPage);
        return view('livewire.products.index');
    }
}
