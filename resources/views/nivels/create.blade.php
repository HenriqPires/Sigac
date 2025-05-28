@extends('layouts.sidebar')

@section('header', 'Cadastrar Nível')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('nivels.store') }}" method="POST">
            @csrf
            @include('nivels._form', ['nivel' => null])
            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle"></i> Salvar
            </button>
        </form>
    </div>
</div>
@endsection