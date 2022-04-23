<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Giro;

class GiroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $giros = new Giro();
        $giros->namegiros = "Agropecuario";
        $giros->save();

        $giros = new Giro();
        $giros->namegiros = "Comercio";
        $giros->save();

        $giros = new Giro();
        $giros->namegiros = "Producción";
        $giros->save();

        $giros = new Giro();
        $giros->namegiros = "Servicios";
        $giros->save();
    }
}
