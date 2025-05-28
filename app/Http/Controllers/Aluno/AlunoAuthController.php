<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AlunoAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('aluno.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('aluno')->attempt(array_merge($credentials, ['tipo' => 'aluno']))) {
            return redirect()->intended('/dashboard-aluno');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas.']);
    }

    public function showRegisterForm()
    {
        return view('aluno.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo' => 'aluno',
        ]);

        Auth::guard('aluno')->login($user);

        return redirect('/dashboard-aluno');
    }

    public function logout()
    {
        Auth::guard('aluno')->logout();
        return redirect('/aluno/login');
    }
}
