@extends('layouts.sidebar')

@section('header', 'Solicitações de Horas - Administração')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($solicitacoes->isEmpty())
        <div class="alert alert-info">Nenhuma solicitação encontrada.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Atividade</th>
                    <th>Horas</th>
                    <th>Status</th>
                    <th>Comprovante</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitacoes as $solicitacao)
                <tr>
                    <td>{{ $solicitacao->user->name }}</td>
                    <td>{{ $solicitacao->atividade }}</td>
                    <td>{{ $solicitacao->quantidade_horas }}</td>
                    <td>{{ ucfirst($solicitacao->status) }}</td>
                    <td>
                        @if($solicitacao->comprovante)
                            <a href="{{ asset('storage/' . $solicitacao->comprovante) }}" target="_blank">Ver</a>
                        @else
                            Nenhum
                        @endif
                    </td>
                    <td>
                        @if($solicitacao->status === 'pendente')
                        <form action="{{ route('admin.solicitacoes.aprovar', $solicitacao->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success btn-sm">Aprovar</button>
                        </form>

                        <form action="{{ route('admin.solicitacoes.rejeitar', $solicitacao->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger btn-sm">Rejeitar</button>
                        </form>
                        @else
                            {{ ucfirst($solicitacao->status) }}
                        @endif

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
