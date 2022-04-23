<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cobertura; 

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'empresas';
    protected $fillable = [
        'razonsocial',
        'ruc',
        'marca',
        'descripcion',
        'telefonoempresa',
        'correoempresa',
        'logoempresa',
        'direccion',
        'cuentabanco',
        'ncuentabanco',
        'ncuentabancocci',
        'billeteradigital',
        'numerobilletera',
        'enlacefacebook',
        'enlaceinstagram',
        'enlacewhatsapp',
        'estadoemp',
        'giro_id',
        'usuario_id',
        'propietario_id',
        'ubigeo_id'
        ];

    public function giro(){
        return $this->belongsTo(Giro::class);
    }

    public function ubigeo(){
        return $this->belongsTo(Ubigeo::class, 'ubigeo_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }

    public function productos(){
        return $this->hasMany(Producto::class, 'empresa_id');
    }

    public function ventas(){
        return $this->hasMany(Venta::class);
    }
    public function cobertura(){
        $cobertura=Cobertura::where('empresa_id',$this->id)->first();
        return $cobertura;
    }
}
