@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Meus Documentos</h1>
    <a href="{{ route('documentos.create') }}" class="btn btn-primary mb-3">Nova Solicitação</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Descrição</th>
                <th>Horas Solicitadas</th>
                <th>Status</th>
                <th>Documento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documentos as $doc)
            <tr>
                <td>{{ $doc->categoria->nome ?? 'N/A' }}</td>
                <td>{{ $doc->descricao }}</td>
                <td>{{ $doc->horas_in }}</td>
                <td>{{ ucfirst($doc->status) }}</td>
                <td><a href="{{ Storage::url($doc->url) }}" target="_blank">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
