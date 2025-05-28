@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h1>Editar Turma</h1>
    <form action="{{ route('turmas.update', $turma) }}" method="POST">
        @csrf
        @method('PUT')
        @include('turmas.form')
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
