@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Solicitar Validação de Horas</h1>

    <form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="descricao" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Horas Solicitadas</label>
            <input type="number" name="horas_in" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Documento (PDF)</label>
            <input type="file" name="arquivo" class="form-control-file" required accept=".pdf">
        </div>

        <button type="submit" class="btn btn-success">Enviar Solicitação</button>
        <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
