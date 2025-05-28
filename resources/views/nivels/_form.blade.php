<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" value="{{ old('nome', $nivel?->nome) }}" required>
    @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
</div>
