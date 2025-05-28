<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAluno
{
    
    public function handle($request, Closure $next)
    {
        if (Auth::guard('aluno')->check() && Auth::guard('aluno')->user()->tipo === 'aluno') {
            return $next($request);
        }

        abort(403, 'Acesso não autorizado.');
    }
}
