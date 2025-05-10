<?php

namespace App\Http\Middleware;

use Closure;
use illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Asegúrate de usar esta importaciónuse Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmployeeRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol_id == '3' /*Rol empleado*/ ) {
            return $next($request);
        }

        abort(403, 'Acceso no autorizado');
    }
}
