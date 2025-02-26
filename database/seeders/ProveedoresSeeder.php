<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Proveedor;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Proveedor::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $proveedores = [
            ['nombre' => 'Soluciones Informáticas MX', 'email' => 'contacto@solucionesmx.com', 'telefono' => '5543216789'],
            ['nombre' => 'Tech Experts SA', 'email' => 'soporte@techexperts.com', 'telefono' => '5523456789'],
            ['nombre' => 'InnovaTech', 'email' => 'ventas@innovatech.com', 'telefono' => '5512345678'],
            ['nombre' => 'Servicios Digitales Plus', 'email' => 'info@serviciosplus.com', 'telefono' => '5598765432'],
            ['nombre' => 'Mantenimiento Integral', 'email' => 'admin@mantenimientoint.com', 'telefono' => '5587654321'],
            ['nombre' => 'Soluciones Empresariales 360', 'email' => 'ventas@empresariales360.com', 'telefono' => '5511122233'],
            ['nombre' => 'Redes y Conectividad Global', 'email' => 'soporte@redesglobal.com', 'telefono' => '5544332211'],
            ['nombre' => 'CyberSafe Security', 'email' => 'contacto@cybersafe.com', 'telefono' => '5577889900'],
            ['nombre' => 'Data Recovery Express', 'email' => 'help@dataexpress.com', 'telefono' => '5522334455'],
            ['nombre' => 'IT Solutions Premium', 'email' => 'support@itsolutions.com', 'telefono' => '5566778899'],
        ];

        foreach ($proveedores as $proveedor) {
            Proveedor::create($proveedor);
        }
    }
}

// $proveedores = [
//     ['nombre' => 'Soluciones Informáticas MX', 'email' => 'contacto@solucionesmx.com', 'telefono' => '5543216789'],
//     ['nombre' => 'Redes y Conectividad SA', 'email' => 'info@redesyconectividad.com', 'telefono' => '5512345678'],
//     ['nombre' => 'Seguridad Digital Pro', 'email' => 'support@seguridadpro.com', 'telefono' => '5587654321'],
//     ['nombre' => 'Consultores TI Global', 'email' => 'ventas@consultorestiglobal.com', 'telefono' => '5576543210'],
//     ['nombre' => 'Servicios Tecnológicos Plus', 'email' => 'soporte@stplus.com', 'telefono' => '5598765432'],
// ];