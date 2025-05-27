@extends('layouts.sidebar')

@section('content')
<div class="container">
    <h1>Nova Turma</h1>
    <form action="{{ route('turmas.store') }}" method="POST">
        @include('turmas.form')
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
