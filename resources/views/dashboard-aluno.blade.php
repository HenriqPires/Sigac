@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h1>Bem-vindo, Aluno</h1>
    <p> Solicitar horas complementares, acompanhar status, etc.</p>
</div>

<a href="{{ route('aluno.solicitacoes.create') }}" class="btn btn-primary">Solicitar Horas Complementares</a>
<a href="{{ route('aluno.solicitacoes.index') }}" class="btn btn-secondary">Minhas Solicitações</a>

<a href="{{ route('aluno.declaracao') }}" class="btn btn-outline-success mt-3">
    <i class="bi bi-file-earmark-arrow-down"></i> Gerar Declaração
</a> 
@endsection