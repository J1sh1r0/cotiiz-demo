<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProveedorUsuario extends Model
{
    use HasFactory;

    protected $table = 'proveedor_usuarios';

    protected $fillable = [
        'type',
        'name',
        'email',
        'password',
        'passwordshow',
        'firstname',
        'lastname',
        'second_name',
        'second_lastname',
        'workstation',
        'phone',
        'area_work',
        'country',
        'state',
        'municipality',
        'colony',
        'street',
        'street_number',
        'postal_code',
        'file_gafete',
        'file_gafete2',
        'file_credential',
        'file_credential2',
        'estatus',
        'perfil',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}
