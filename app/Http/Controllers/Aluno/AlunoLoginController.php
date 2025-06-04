<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoLoginController extends Controller
{
     public function showLoginForm()
    {
        return view('auth.aluno.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->tipo === 'aluno') {
                return redirect()->intended(route('dashboard.aluno'));
            }

            Auth::logout();
            return back()->withErrors([
                'email' => 'Apenas alunos podem acessar por aqui.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('aluno.login');
    }
}