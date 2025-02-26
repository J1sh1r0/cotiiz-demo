<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Solicitud;
use App\Models\Proveedor;
use App\Models\Empresa;
use App\Models\ServicioTecnico;
use Carbon\Carbon;

class SolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtén IDs aleatorios de proveedores, empresas y servicios técnicos
        $proveedores = Proveedor::pluck('id')->toArray();
        $empresas = Empresa::pluck('id')->toArray();
        $servicios = ServicioTecnico::pluck('id')->toArray();

        // Si alguna de las tablas no tiene datos, detenemos el proceso
        if (empty($proveedores) || empty($empresas) || empty($servicios)) {
            return;
        }

        $solicitudes = [
            ['proveedor_id' => $proveedores[array_rand($proveedores)], 'empresa_id' => $empresas[array_rand($empresas)], 'servicio_id' => $servicios[array_rand($servicios)], 'descripcion' => 'Instalación de red empresarial', 'estado' => 'pendiente'],
            ['proveedor_id' => $proveedores[array_rand($proveedores)], 'empresa_id' => $empresas[array_rand($empresas)], 'servicio_id' => $servicios[array_rand($servicios)], 'descripcion' => 'Mantenimiento de servidores', 'estado' => 'aprobado'],
            ['proveedor_id' => $proveedores[array_rand($proveedores)], 'empresa_id' => $empresas[array_rand($empresas)], 'servicio_id' => $servicios[array_rand($servicios)], 'descripcion' => 'Configuración de firewall y seguridad', 'estado' => 'rechazado'],
            ['proveedor_id' => $proveedores[array_rand($proveedores)], 'empresa_id' => $empresas[array_rand($empresas)], 'servicio_id' => $servicios[array_rand($servicios)], 'descripcion' => 'Migración a la nube', 'estado' => 'pendiente'],
            ['proveedor_id' => $proveedores[array_rand($proveedores)], 'empresa_id' => $empresas[array_rand($empresas)], 'servicio_id' => $servicios[array_rand($servicios)], 'descripcion' => 'Actualización de software empresarial', 'estado' => 'aprobado'],
        ];

        foreach ($solicitudes as $solicitud) {
            Solicitud::create([
                'proveedor_id' => $solicitud['proveedor_id'],
                'empresa_id' => $solicitud['empresa_id'],
                'servicio_id' => $solicitud['servicio_id'],
                'descripcion' => $solicitud['descripcion'],
                'estado' => $solicitud['estado'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
