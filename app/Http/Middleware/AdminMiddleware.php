<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario está autenticado y es un administrador
        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        // Si el usuario no es un administrador, redirige a otra página o muestra un mensaje de error
        return redirect()->route('home')->with('error', 'Acceso no autorizado.');
    }
}
