<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $aluno->nome ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="cpf" class="form-label">CPF</label>
    <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf', $aluno->cpf ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $aluno->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="curso_id" class="form-label">Curso</label>
    <select name="curso_id" id="curso_id" class="form-control" required>
        <option value="">Selecione o curso</option>
        @foreach($cursos as $curso)
            <option value="{{ $curso->id }}" {{ (old('curso_id', $aluno->curso_id ?? '') == $curso->id) ? 'selected' : '' }}>
                {{ $curso->nome }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="turma_id" class="form-label">Turma</label>
    <select name="turma_id" id="turma_id" class="form-control" required>
        <option value="">Selecione a turma</option>
        @foreach($turmas as $turma)
            <option value="{{ $turma->id }}" {{ (old('turma_id', $aluno->turma_id ?? '') == $turma->id) ? 'selected' : '' }}>
                {{ $turma->ano }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-success">Salvar</button>
<a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>