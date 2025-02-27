<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcuenta extends Model
{
    use HasFactory;

    protected $table = 'subcuentas'; // Asegúrate de que coincide con tu base de datos
    protected $fillable = ['nombre', 'correo', 'telefono'];
}
