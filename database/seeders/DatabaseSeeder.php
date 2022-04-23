<?php

namespace Database\Seeders;

use App\Models\TipoUsuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoUserTableSeeder::class);
        $this->call(GiroTableSeeder::class);
        $this->call(AdministradorTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
