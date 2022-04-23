<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{   
    protected $fillable=['namecategoria','descripcion'];
    use HasFactory;
    public function subcategoria()
    {
        return $this->hasMany('App\Models\Subcategoria');
    }
}
