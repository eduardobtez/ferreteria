@extends('layout')

@section('title', 'Editar Medida')

@section('content')
<h2>Editar Medida</h2>

<form action="{{ route('medidas.update', $medida->id_medida) }}" method="POST" novalidate>
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción *</label>
        <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion', $medida->descripcion) }}" class="form-control @error('descripcion') is-invalid @enderror" required maxlength="250">
        @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="abreviatura" class="form-label">Abreviatura *</label>
        <input type="text" id="abreviatura" name="abreviatura" value="{{ old('abreviatura', $medida->abreviatura) }}" class="form-control @error('abreviatura') is-invalid @enderror" required maxlength="10">
        @error('abreviatura')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Activo *</label>
        <select name="activo" class="form-select @error('activo') is-invalid @enderror" required>
            <option value="">Seleccione estado</option>
            <option value="1" {{ old('activo', $medida->activo) == '1' ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ old('activo', $medida->activo) == '0' ? 'selected' : '' }}>No</option>
        </select>
        @error('activo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('medidas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
