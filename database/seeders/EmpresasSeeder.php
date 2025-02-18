<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasSeeder extends Seeder
{
    public function run()
    {
        DB::table('empresas')->insert([
            ['nombre' => 'Empresa A', 'correo' => 'empresaA@example.com', 'telefono' => '555555555'],
            ['nombre' => 'Empresa B', 'correo' => 'empresaB@example.com', 'telefono' => '666666666'],
        ]);
    }
}
