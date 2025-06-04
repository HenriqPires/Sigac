@extends('layouts.sidebar')

@section('header')
    <i class="bi bi-house-door-fill me-2"></i> Bem-vindo ao Sistema SIGAC
@endsection

@section('content')
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
    <div class="col">
        <div class="card h-100 border-success shadow">
            <div class="card-body text-center">
                <h5 class="card-title text-success"><i class="bi bi-book-fill me-2"></i>Cursos</h5>
                <a href="{{ route('cursos.index') }}" class="btn btn-success w-100">Gerenciar Cursos</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 border-primary shadow">
            <div class="card-body text-center">
                <h5 class="card-title text-primary"><i class="bi bi-people-fill me-2"></i>Turmas</h5>
                <a href="{{ route('turmas.index') }}" class="btn btn-primary w-100">Gerenciar Turmas</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 border-warning shadow">
            <div class="card-body text-center">
                <h5 class="card-title text-warning"><i class="bi bi-diagram-3-fill me-2"></i>Eixos</h5>
                <a href="{{ route('eixos.index') }}" class="btn btn-warning text-white w-100">Gerenciar Eixos</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100 border-info shadow">
            <div class="card-body text-center">
                <h5 class="card-title text-info"><i class="bi bi-tags-fill me-2"></i>Categorias</h5>
                <a href="{{ route('categorias.index') }}" class="btn btn-info text-white w-100">Gerenciar Categorias</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-dark shadow-sm h-100">
            <div class="card-body text-center">
                <h5 class="card-title"><i class="bi bi-person-badge-fill me-2"></i>Alunos</h5>
                <a href="{{ route('alunos.index') }}" class="btn btn-dark w-100">Gerenciar Alunos</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-secondary shadow-sm h-100">
            <div class="card-body text-center">
                <h5 class="card-title"><i class="bi bi-bar-chart-fill me-2"></i>Níveis</h5>
                <a href="{{ route('nivels.index') }}" class="btn btn-outline-secondary w-100">Gerenciar Níveis</a>
            </div>
        </div>
    </div>
    <div class="col">
    <div class="card border-danger shadow-sm h-100">
        <div class="card-body text-center">
            <h5 class="card-title text-danger"><i class="bi bi-clipboard-check-fill me-2"></i>Avaliar Solicitações</h5>
            <a href="{{ route('admin.solicitacoes.index') }}" class="btn btn-danger w-100">Visualizar Solicitações</a>
        </div>
    </div>
    </div>
    <div class="col">
        <div class="card border-primary shadow-sm h-100">
            <div class="card-body text-center">
                <h5 class="card-title"><i class="bi bi-bar-chart-line-fill me-2"></i>Gráficos</h5>
                <a href="{{ route('admin.graficos.horas') }}" class="btn btn-outline-primary w-100">Visualizar Gráfico de Horas</a>
            </div>
        </div>
    </div>
</div>
@endsection