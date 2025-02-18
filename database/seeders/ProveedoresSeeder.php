<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedoresSeeder extends Seeder
{
    public function run()
    {
        DB::table('proveedores')->insert([
            ['nombre' => 'Proveedor 1', 'correo' => 'proveedor1@example.com', 'telefono' => '123456789'],
            ['nombre' => 'Proveedor 2', 'correo' => 'proveedor2@example.com', 'telefono' => '987654321'],
        ]);
    }
}
