<?php

namespace App\service;

use Illuminate\Support\Facades\DB;
class asesor
{
    public function get(){
        $asesores = DB::table('users')
        ->where('estadouser', '=', 'Activo')
        ->where('tipousuario_id', '=', 2)
        ->select('users.id','users.name')
        ->get();
        foreach($asesores as $asesor){
            $asesorArray[$asesor->id] = $asesor->name;
        }
        return $asesorArray;
    }
}