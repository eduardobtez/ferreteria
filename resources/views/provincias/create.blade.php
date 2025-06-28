@extends('layout')

@section('title', 'Nueva Provincia')

@section('content')
<h2>Crear Nueva Provincia</h2>

<form action="{{ route('provincias.store') }}" method="POST" novalidate>
    @csrf

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción *</label>
        <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" class="form-control @error('descripcion') is-invalid @enderror" required maxlength="250">
        @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('provincias.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
