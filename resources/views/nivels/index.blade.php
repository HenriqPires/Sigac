@extends('layouts.sidebar')

@section('header', 'Gerenciar Níveis')

@section('content')
<div class="mb-3 text-end">
    <a href="{{ route('nivels.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Novo Nível
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
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nivels as $nivel)
            <tr>
                <td>{{ $nivel->id }}</td>
                <td>{{ $nivel->nome }}</td>
                <td>
                    <a href="{{ route('nivels.edit', $nivel) }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('nivels.destroy', $nivel) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja excluir este nível?')">
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