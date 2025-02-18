<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioTecnico extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion']; // Ajusta según tu estructura
    protected $table = 'servicios_tecnicos'; // 🔹 Especificamos el nombre correcto de la tabla

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
}
