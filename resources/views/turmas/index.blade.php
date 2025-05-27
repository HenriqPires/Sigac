@extends('layouts.sidebar')

@section('header')
    Gerenciar Turmas
@endsection

@section('content')
<div class="container">
    <a href="{{ route('turmas.create') }}" class="btn btn-primary mb-3">Nova Turma</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ano</th>
                <th>Curso</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($turmas as $turma)
            <tr>
                <td>{{ $turma->ano }}</td>
                <td>{{ $turma->curso->nome ?? 'Curso não atribuído' }}</td>
                <td>
                    <a href="{{ route('turmas.edit', $turma) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('turmas.destroy', $turma) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
