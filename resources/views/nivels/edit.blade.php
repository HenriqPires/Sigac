@extends('layouts.sidebar')

@section('header', 'Editar Nível')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('nivels.update', $nivel) }}" method="POST">
            @csrf
            @method('PUT')
            @include('nivels._form', ['nivel' => $nivel])
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Atualizar
            </button>
        </form>
    </div>
</div>
@endsection