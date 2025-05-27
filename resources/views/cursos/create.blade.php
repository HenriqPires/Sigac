@extends('layouts.sidebar')

@section('header')
    Novo Curso
@endsection

@section('content')
<div class="container">
    
    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Sigla</label>
            <input type="text" name="sigla" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Total de Horas</label>
            <input type="number" name="total_horas" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
