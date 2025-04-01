<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // Nombre de la tabla en la base de datos

    protected $fillable = ['nombre', 'descripcion', 'precio', 'estatus', 'foto']; // Campos permitidos para asignación masiva
}
