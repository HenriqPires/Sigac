@csrf
<div class="form-group">
    <label>Ano</label>
    <input type="number" name="ano" class="form-control" value="{{ old('ano', $turma->ano ?? '') }}" required>
</div>
<div class="form-group">
    <label>Curso</label>
    <select name="curso_id" class="form-control" required>
        @foreach($cursos as $curso)
            <option value="{{ $curso->id }}" {{ (old('curso_id', $turma->curso_id ?? '') == $curso->id) ? 'selected' : '' }}>
                {{ $curso->nome }}
            </option>
        @endforeach
    </select>
</div>
