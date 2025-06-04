@extends('layouts.sidebar')

@section('header')
    Gerenciar Níveis
@endsection

@section('content')
<div class="container">

    <a href="{{ route('nivels.create') }}" class="btn btn-primary mb-3">Adicionar Novo Nível</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
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
                        <a href="{{ route('nivels.edit', $nivel) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('nivels.destroy', $nivel) }}" method="POST" style="display:inline;" onsubmit="return confirm('Deseja excluir este nível?')">
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
