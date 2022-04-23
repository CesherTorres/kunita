<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdministradorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
        'name' => 'Admin Kunaq',
        'tipodocumento' => 'DNI',
        'ndocumento' => '48895680',
        'telefono' => '998118796',
        'direccion' => 'Av. La Calle',
        'email' => 'adminkunaq@mail.com',
        'password' => Hash::make('admin'),
        'fotouser' => 'asesor.png',
        'confirmpassword' => Hash::make('admin'),
        'estadouser' => 'activo',
        'ubigeo_id' => '100',
        'tipousuario_id' => '1',
        ]);
    }
}
