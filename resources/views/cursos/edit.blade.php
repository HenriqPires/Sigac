@extends('layouts.sidebar')

@section('header')
    Editar Curso
@endsection

@section('content')
<div class="container">

    <form action="{{ route('cursos.update', $curso) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $curso->nome }}" required>
        </div>
        <div class="form-group">
            <label>Sigla</label>
            <input type="text" name="sigla" class="form-control" value="{{ $curso->sigla }}" required>
        </div>
        <div class="form-group">
            <label>Total de Horas</label>
            <input type="number" name="total_horas" class="form-control" value="{{ $curso->total_horas }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
