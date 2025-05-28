<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->tipo === 'aluno') {
            return $next($request);
        }

        abort(403, 'Acesso não autorizado.');
    }
}