<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolicitudesSeeder extends Seeder
{
    public function run()
    {
        DB::table('solicitudes')->insert([
            ['proveedor_id' => 1, 'empresa_id' => 1, 'servicio_id' => 1, 'estado' => 'pendiente'],
            ['proveedor_id' => 2, 'empresa_id' => 2, 'servicio_id' => 2, 'estado' => 'aprobado'],
        ]);
    }
}
