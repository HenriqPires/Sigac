@extends('layouts.sidebar')

@section('header')
    Gerenciar Cursos
@endsection

@section('content')
<div class="container">

    <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Adicionar Novo Curso</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sigla</th>
                <th>Total de Horas</th>
                <th>Eixo</th>
                <th>Nível</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso->id }}</td>
                <td>{{ $curso->nome }}</td>
                <td>{{ $curso->sigla }}</td>
                <td>{{ $curso->total_horas }}</td>
                <td>{{ $curso->eixo->nome ?? 'N/A' }}</td>
                <td>{{ $curso->nivel->nome ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('cursos.destroy', $curso) }}" method="POST" style="display:inline;">
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
