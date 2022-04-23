<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    use HasFactory;
    protected $table = 'ubigeoperu';
    protected $fillable = [
        'departamento',
        'provincia',
        'distrito',
        'ubigeo'
        ];

        public function coberturas()
        {
            return $this->hasMany(Cobertura::class);
        }
}
