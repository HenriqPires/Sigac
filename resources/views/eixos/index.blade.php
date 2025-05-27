@extends('layouts.sidebar')

@section('header')
    Gerenciar Eixo
@endsection

@section('content')
<div class="container">
    <a href="{{ route('eixos.create') }}" class="btn btn-primary mb-3">Novo Eixo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eixos as $eixo)
            <tr>
                <td>{{ $eixo->nome }}</td>
                <td>
                    <a href="{{ route('eixos.edit', $eixo) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('eixos.destroy', $eixo) }}" method="POST" style="display:inline;">
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
