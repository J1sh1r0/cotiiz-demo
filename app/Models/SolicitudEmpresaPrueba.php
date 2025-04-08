<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudEmpresaPrueba extends Model
{
    protected $table = 'solicitudes_empresa_prueba';
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
        'tiempo',
        'user_id'
    ];

    protected $casts = [
        'presupuesto' => 'decimal:2',
        'presupuesto_servicio' => 'decimal:2'
    ];

    protected $attributes = [
        'empresa_id' => 1,
        'user_id' => 1,
        'estado' => 'pendiente'
    ];

    // Relaciones
    public function proveedor()
    {
        return $this->belongsTo(User::class, 'proveedor_id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Scopes para filtrar por tipo
    public function scopeProductos($query)
    {
        return $query->where('tipo', 'producto');
    }

    public function scopeServicios($query)
    {
        return $query->where('tipo', 'servicio');
    }

    public function scopeProfesionistas($query)
    {
        return $query->where('tipo', 'profesionista');
    }
}
