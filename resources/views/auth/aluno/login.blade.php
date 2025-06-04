@extends('layouts.guest')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow" style="min-width: 400px;">
        <div class="card-header text-center bg-success text-white">
            <h4 class="mb-0"><i class="bi bi-person-fill me-2"></i>Login do Aluno - SIGAC</h4>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('aluno.login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input id="password" type="password" name="password" required class="form-control">
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                        Lembrar de mim
                    </label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('aluno.password.request'))
                        <a href="{{ route('aluno.password.request') }}">Esqueceu sua senha?</a>
                    @endif

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
