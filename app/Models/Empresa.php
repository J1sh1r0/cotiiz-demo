<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'correo', 'telefono'];

    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
}
