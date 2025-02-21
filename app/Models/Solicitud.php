<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //use SoftDeletes;
    use HasFactory;

    protected $table = 'solicitudes'; // Asegurar que coincide con la base de datos
    protected $fillable = ['proveedor_id', 'empresa_id', 'servicio_id', 'descripcion', 'estado'];


    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function servicio()
    {
        return $this->belongsTo(ServicioTecnico::class);
    }
}
