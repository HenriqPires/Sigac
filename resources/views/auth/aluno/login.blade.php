@extends('layouts.guest')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow" style="min-width: 420px;">
        <div class="card-header text-center bg-success text-white">
            <h4 class="mb-0"><i class="bi bi-box-arrow-in-right me-2"></i>Login do Aluno</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('aluno.login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required class="form-control">
                    @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input id="password" type="password" name="password" required class="form-control">
                    @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('aluno.register') }}">Não tem conta?</a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection