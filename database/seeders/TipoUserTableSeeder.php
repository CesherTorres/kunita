<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;

class TipoUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipouser = new TipoUsuario();
        $tipouser->name_tipo_usuario = "Administrador";
        $tipouser->descripcion = "Administrador kunaq";
        $tipouser->save();

        $tipouser = new TipoUsuario();
        $tipouser->name_tipo_usuario = "Asesor";
        $tipouser->descripcion = "Asesor kunaq";
        $tipouser->save();

        $tipouser = new TipoUsuario();
        $tipouser->name_tipo_usuario = "Pyme";
        $tipouser->descripcion = "Administrador Pyme";
        $tipouser->save();
    }
}
