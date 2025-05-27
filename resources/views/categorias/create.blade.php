@extends('layouts.sidebar')

@section('header')
    Nova Categoria
@endsection


@section('content')
<div class="container">

    <form action="{{ route('categorias.store') }}" method="POST">
        @include('categorias.form')
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
