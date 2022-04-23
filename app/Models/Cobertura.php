<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobertura extends Model
{
    use HasFactory;
    protected $table = 'coberturas';
    protected $fillable = [
        'ubigeocobertura_id',
        'empresa_id',
        'precioenvio',
        'diasestimados'
        ];

        public function ubigeos(){
            return $this->belongsTo(Ubigeo::class, 'ubigeocobertura_id');
        }

        public function ventas(){
            return $this->hasMany(Venta::class);
        }
        public function empresa(){
            return $this->hasOne(Empresa::class,'empresa_id');
        }

}
