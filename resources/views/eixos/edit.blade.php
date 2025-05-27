@extends('layouts.sidebar')

@section('header')
    Editar Eixo
@endsection

@section('content')
<div class="container">
    <form action="{{ route('eixos.update', $eixo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $eixo->nome }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('eixos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
