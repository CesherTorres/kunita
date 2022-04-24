<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = [
            'nameproducto',
            'marca',
            'modelo',
            'genero',
            'alto',
            'ancho',
            'profundidad',
            'peso',
            'temperatura',
            'oferta',
            'preciosugerido',
            'fecha_vencimiento',
            'stock',
            'descripcion',
            'imguno',
            'imgdos',
            'imgtres',
            'imgprincipal',
            'estado',
            'subcategoria_id',
            'empresa_id',
            'estado_oferta',
        ];      
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function subcategoria(){
        return $this->belongsTo(Subcategoria::class,'subcategoria_id');
    }
    static function get_active_productos(){
        return self::where('estado','Activo');
    }
    public function has_offer()
    {
        $descuento = false;

        if ($this->estado_oferta==1) {

            if (!$this->comprobarEstado()) {
                $descuento = (($this->preciosugerido)-((($this->preciosugerido)*($this->oferta))/100));
                $this->nuevaoferta=$descuento;
                $this->save();
            }else{
                $this->nuevaoferta=$this->preciosugerido;
                $this->estado_oferta=0;
                $this->fecha_vencimiento=null;
                $this->save();
            }

        }else{
                $this->nuevaoferta=$this->preciosugerido;
                $this->estado_oferta=0;
                $this->fecha_vencimiento=null;
                $this->save();
        }

        return $descuento;

    }
    public function comprobarEstado(){

        $hoy = Carbon::now();
        $fecha_final = Carbon::parse($this->fecha_vencimiento);

        if ($hoy <= $fecha_final) {
            return false;
        }else{
            return true;
        }
    
    }
}
