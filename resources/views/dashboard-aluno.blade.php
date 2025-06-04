@extends('layouts.sidebar-aluno')

@section('header')
    <i class="bi bi-house-door-fill me-2"></i> Bem-vindo, Aluno
@endsection

@section('content')
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">

    <div class="col">
        <div class="card h-100 border-primary shadow">
            <div class="card-body text-center">
                <h5 class="card-title text-primary">
                    <i class="bi bi-file-earmark-plus me-2"></i>Solicitar Horas
                </h5>
                <a href="{{ route('aluno.solicitacoes.create') }}" class="btn btn-primary w-100">Nova Solicitação</a>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 border-secondary shadow">
            <div class="card-body text-center">
                <h5 class="card-title text-secondary"> <i class="bi bi-list-check me-2"></i>Minhas Solicitações</h5>
                <a href="{{ route('aluno.solicitacoes.index') }}" class="btn btn-outline-secondary w-100">Ver Histórico</a>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100 border-success shadow">
            <div class="card-body text-center">
                <h5 class="card-title text-success">
                    <i class="bi bi-file-earmark-arrow-down me-2"></i>Declaração
                </h5>
                <a href="{{ route('aluno.declaracao') }}" class="btn btn-success w-100">Gerar PDF</a>
            </div>
        </div>
    </div>

</div>
@endsection
