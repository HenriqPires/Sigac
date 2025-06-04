@extends('layouts.sidebar-aluno')

@section('header', 'Minhas Solicitações')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Atividade</th>
            <th>Descrição</th>
            <th>Horas</th>
            <th>Status</th>
            <th>Comprovante</th>
        </tr>
    </thead>
    <tbody>
        @foreach($solicitacoes as $s)
        <tr>
            <td>{{ $s->atividade }}</td>
            <td>{{ $s->descricao }}</td>
            <td>{{ $s->quantidade_horas }}</td>
            <td>{{ ucfirst($s->status) }}</td>
            <td>
                @if($s->comprovante)
                    <a href="{{ asset('storage/' . $s->comprovante) }}" target="_blank">Ver</a>
                @else
                    Nenhum
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
