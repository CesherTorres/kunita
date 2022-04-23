<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'ventas';
    protected $fillable = [
        'namecliente',
        'direccion',
        'referencia',
        'cobertura_id',
        'tipodocumento',
        'ndocumento',
        'correo',
        'celular',
        'tipocomprobante',
        'numerocomprobante',
        'fecha_hora',
        'total',
        'estado',
        'precio_envio',
        'empresa_id'
        ];

    public function cobertura(){
        return $this->belongsTo(Cobertura::class, 'cobertura_id');
    }

    public function empresa(){
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
}


