<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'solicitudes';
    protected $fillable = [
        'titulo',
        'descripcion',
        'proveedor_id',
        'empresa_id',
        'servicio_id',
        'estado',
        'tipo',
        'modelo',
        'nombre',
        'marca',
        'cantidad',
        'presupuesto',
        'link_drive',
        'tipo_solicitudServicio',
        'descripcion_servicio',
        'presupuesto_servicio',
        'trabajo',
        'detalles',
        'conocimientos',
        'cursos',
        'tiempo'
    ];

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

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($solicitud) {
    //         $solicitud->proveedor_id = $solicitud->proveedor_id ?? 1;
    //         $solicitud->empresa_id = $solicitud->empresa_id ?? 1;
    //         $solicitud->servicio_id = $solicitud->servicio_id ?? 1;
    //     });
    // }
}
