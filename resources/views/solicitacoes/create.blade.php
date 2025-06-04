@extends('layouts.sidebar-aluno')

@section('header', 'Solicitar Horas Complementares')

@section('content')
<form action="{{ route('aluno.solicitacoes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="atividade">Atividade</label>
        <input type="text" name="atividade" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label for="quantidade_horas">Quantidade de Horas</label>
        <input type="number" name="quantidade_horas" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="comprovante">Comprovante (PDF, JPG, PNG)</label>
        <input type="file" name="comprovante" class="form-control">
    </div>
    <button class="btn btn-success">Enviar Solicitação</button>
</form>
@endsection
