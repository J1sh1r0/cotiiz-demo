<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PerfilMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Si el usuario no tiene un perfil seleccionado, redirigir a la página de selección de perfil
        if (!Session::has('perfil_seleccionado')) {
            return redirect()->route('seleccion_perfil');
        }

        return $next($request);
    }
}
