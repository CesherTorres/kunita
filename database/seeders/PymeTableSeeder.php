<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PymeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pyme = Empresa::create([
            'razonsocial' => 'Cuantica Group',
            'ruc' => '1048895612',
            'marca' => 'Cuantica',
            'descripcion' => 'Tecnologia',
            'telefonoempresa' => '056256531',
            'logoempresa' =>  'asesor.png',
            'direccion' => 'Urb. Bancarios',
            'cuentabanco' => 'BCP',
            'ncuentabanco' => '123456789',
            'ncuentabancocci' => '4569517563',
            'billeteradigital' => 'Yape',
            'numerobilletera' => '981518463',
            'enlacefacebook' => 'https://www.youtube.com/watch?v=L42lLOOLB8g&list=RDCMUCWuyqD6Pm70GwjWtENF5XJA&start_radio=1',
            'enlaceinstagram' => 'https://www.youtube.com/watch?v=L42lLOOLB8g&list=RDCMUCWuyqD6Pm70GwjWtENF5XJA&start_radio=1',
            'enlacewhatsapp' => 'https://www.youtube.com/watch?v=L42lLOOLB8g&list=RDCMUCWuyqD6Pm70GwjWtENF5XJA&start_radio=1',
            'estado' => '1',
            'ubigeo_id' => '100',
            'giro_id' => '1',
            'usuario_id' => '3',
            ]);
    }


}
