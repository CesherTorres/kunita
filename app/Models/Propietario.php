<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;
    protected $table = 'propietarios';
    protected $fillable = [
        'usuario_id'
        ];

        public function empresas()
        {
            return $this->hasOne(Empresa::class);
        }

        public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
