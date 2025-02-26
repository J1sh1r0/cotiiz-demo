<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresasSeeder extends Seeder
{
    public function run()
    {
        Empresa::factory()->count(10)->create(); // Genera 10 empresas
    }
}
