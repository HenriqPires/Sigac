<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
   public function handle(Request $request, Closure $next)
{
    if (Auth::check() && Auth::user()->tipo === 'admin') {
        return $next($request);
    }

    abort(403, 'Acesso não autorizado.');
}
}