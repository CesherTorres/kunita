<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'tipodocumento',
        'ndocumento',
        'telefono',
        'direccion',
        'fotouser',
        'confirmpassword',
        'ubigeo_id',
        'email',
        'estadouser',
        'tipousuario_id',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function empresas()
    {
        return $this->hasMany(Empresa::class, 'usuario_id');
    }

    public function tipousuario()
    {
        return $this->belongsTo(TipoUsuario::class);
    }

    public function ubigeo(){
        return $this->belongsTo(Ubigeo::class);
    }

    public function propietario()
    {
        return $this->hasOne(Propietario::class, 'usuario_id');
    }
}
