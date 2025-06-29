@extends('layout')

@section('title', 'Nueva Medida')

@section('content')
<h2>Crear Nueva Medida</h2>

<form action="{{ route('medidas.store') }}" method="POST" novalidate>
    @csrf

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción *</label>
        <input
            type="text"
            id="descripcion"
            name="descripcion"
            value="{{ old('descripcion') }}"
            class="form-control @error('descripcion') is-invalid @enderror"
            required
            maxlength="250"
            pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$"
            title="Solo se permiten letras y espacios"
        >
        @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="abreviatura" class="form-label">Abreviatura *</label>
        <input
            type="text"
            id="abreviatura"
            name="abreviatura"
            value="{{ old('abreviatura') }}"
            class="form-control @error('abreviatura') is-invalid @enderror"
            required
            maxlength="10"
            pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9³°/%\s]+$"
            title="Puede contener letras, números y símbolos como °, %, ³"
        >
        @error('abreviatura')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Activo *</label>
        <select name="activo" class="form-select @error('activo') is-invalid @enderror" required>
            <option value="">Seleccione estado</option>
            <option value="1" {{ old('activo') == '1' ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ old('activo') == '0' ? 'selected' : '' }}>No</option>
        </select>
        @error('activo')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="btn-group-custom">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('medidas.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
@endsection
