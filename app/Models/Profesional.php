<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profesional extends Model
{
    use HasFactory;

    protected $table = 'profesionales';

    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'profesion',
        'especialidad',
        'telefono',
        'correo',
        'pais',
        'estado',
        'ciudad',
        'direccion',
        'codigo_postal',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'cv',
        'titulo_1',
        'titulo_2',
        'ine_1',
        'ine_2',
        'foto',
        'estatus',
    ];
}
