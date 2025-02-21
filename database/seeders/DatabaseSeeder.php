<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Desactivar la comprobación de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncar tablas
        DB::table('proveedores')->truncate();
        DB::table('empresas')->truncate();
        DB::table('solicitudes')->truncate();
        DB::table('servicios_tecnicos')->truncate();

        // Reactivar la comprobación de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Llamar a los seeders
        $this->call([
            ProveedoresSeeder::class,
            EmpresasSeeder::class,
            ServiciosTecnicosSeeder::class,
            SolicitudesSeeder::class,
        ]);
    }
}
