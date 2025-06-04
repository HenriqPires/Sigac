@extends('layouts.sidebar')

@section('header')
    Gerenciar Alunos
@endsection

@section('content')
<div class="container">

    <a href="{{ route('alunos.create') }}" class="btn btn-primary mb-3">Adicionar Novo Aluno</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
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
                    <td>{{ $aluno->curso?->nome ?? 'N/A' }}</td>
                    <td>{{ $aluno->turma?->nome ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('alunos.edit', $aluno) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('alunos.destroy', $aluno) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
