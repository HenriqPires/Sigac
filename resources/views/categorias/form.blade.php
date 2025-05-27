@csrf
<div class="form-group">
    <label>Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $categoria->nome ?? '') }}" required>
</div>
<div class="form-group">
    <label>Máximo de Horas</label>
    <input type="number" step="0.1" name="maximo_horas" class="form-control" value="{{ old('maximo_horas', $categoria->maximo_horas ?? '') }}" required>
</div>
<div class="form-group">
    <label>Curso</label>
    <select name="curso_id" class="form-control" required>
        @foreach($cursos as $curso)
            <option value="{{ $curso->id }}" {{ (old('curso_id', $categoria->curso_id ?? '') == $curso->id) ? 'selected' : '' }}>
                {{ $curso->nome }}
            </option>
        @endforeach
    </select>
</div>
