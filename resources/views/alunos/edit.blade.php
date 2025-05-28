@extends('layouts.sidebar')

@section('header', 'Editar Aluno')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('alunos.update', $aluno) }}" method="POST">
            @csrf
            @method('PUT')
            @include('alunos._form', ['aluno' => $aluno])
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Atualizar
            </button>
        </form>
    </div>
</div>
@endsection
