@extends('layouts.sidebar')

@section('header')
    Novo Eixo
@endsection

@section('content')
<div class="container">
   
    <form action="{{ route('eixos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('eixos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
