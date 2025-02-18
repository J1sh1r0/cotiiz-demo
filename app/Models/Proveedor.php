<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores'; // Asegurar que coincide con la base de datos
    protected $fillable = ['nombre', 'correo', 'telefono'];

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
}
