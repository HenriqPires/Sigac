@extends('layouts.sidebar')

@section('header', 'Gerenciar Alunos')

@section('content')
<div class="mb-3 text-end">
    <a href="{{ route('alunos.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Novo Aluno
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-hover">
    <thead class="table-success">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Turma</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alunos as $aluno)
            <tr>
                <td>{{ $aluno->id }}</td>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->cpf }}</td>
                <td>{{ $aluno->email }}</td>
                <td>{{ $aluno->curso?->nome }}</td>
                <td>{{ $aluno->turma?->nome }}</td>
                <td>
                    <a href="{{ route('alunos.edit', $aluno) }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('alunos.destroy', $aluno) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
