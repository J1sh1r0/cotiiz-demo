<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PerfilMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('perfil')) {
            return redirect()->route('seleccion.perfil')->with('error', 'Debes seleccionar un perfil.');
        }

        return $next($request);
    }
}
