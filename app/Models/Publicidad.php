<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicidad extends Model
{
    use HasFactory;
    protected $table = 'publicidads';
    protected $fillable = [
        'titulo',
        'propietario',
        'tipo',
        'correo',
        'telefono',
        'descripcion',
        'enlace',
        'imagen'
        ];
}
