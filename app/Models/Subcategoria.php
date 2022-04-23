<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Subcategoria extends Model
{
    protected $fillable=['categoria_id','namesubcategoria'];
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
