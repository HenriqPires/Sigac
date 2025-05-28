@extends('layouts.sidebar')

@section('header')
    Editar Curso
@endsection

@section('content')
<div class="container">

    <form action="{{ route('cursos.update', $curso) }}" method="POST">
        @csrf
        @method('PUT')
           <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $curso->nome) }}" required>
            @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="sigla" class="form-label">Sigla</label>
            <input type="text" name="sigla" class="form-control" value="{{ old('sigla', $curso->sigla) }}" required>
            @error('sigla') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="total_horas" class="form-label">Total de Horas</label>
            <input type="number" name="total_horas" class="form-control" value="{{ old('total_horas', $curso->total_horas) }}" required>
            @error('total_horas') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="eixo_id" class="form-label">Eixo</label>
            <select name="eixo_id" class="form-select" required>
                <option value="">Selecione o Eixo</option>
                @foreach ($eixos as $eixo)
                    <option value="{{ $eixo->id }}" {{ old('eixo_id', $curso->eixo_id) == $eixo->id ? 'selected' : '' }}>
                        {{ $eixo->nome }}
                    </option>
                @endforeach
            </select>
            @error('eixo_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="nivel_id" class="form-label">Nível</label>
            <select name="nivel_id" class="form-select" required>
                <option value="">Selecione o Nível</option>
                @foreach ($niveis as $nivel)
                    <option value="{{ $nivel->id }}" {{ old('nivel_id', $curso->nivel_id) == $nivel->id ? 'selected' : '' }}>
                        {{ $nivel->nome }}
                    </option>
                @endforeach
            </select>
            @error('nivel_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Atualizar
        </button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
