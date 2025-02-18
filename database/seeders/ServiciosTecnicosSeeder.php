<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosTecnicosSeeder extends Seeder
{
    public function run()
    {
        DB::table('servicios_tecnicos')->insert([
            ['nombre' => 'Servicio Técnico 1', 'descripcion' => 'Reparación de hardware'],
            ['nombre' => 'Servicio Técnico 2', 'descripcion' => 'Mantenimiento de software'],
        ]);
    }
}
