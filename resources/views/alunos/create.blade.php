@extends('layouts.sidebar')

@section('header')
    Novo Aluno
@endsection

@section('content')
<div class="container">
    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">Email</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" class="form-select" required>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="turma_id" class="form-label">Turma</label>
            <select name="turma_id" class="form-select" required>
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->ano }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
