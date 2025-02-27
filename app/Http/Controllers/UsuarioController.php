<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Asegúrate de que este modelo existe

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all(); // Cargar todos los usuarios desde la BD
        return view('comprador.usuarios', compact('usuarios'));
    }
}
