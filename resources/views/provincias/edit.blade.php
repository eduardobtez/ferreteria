@extends('layout')

@section('title', 'Editar Provincia')

@section('content')
<h2>Editar Provincia</h2>

<form action="{{ route('provincias.update', $provincia->id_provincia) }}" method="POST" novalidate>
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción *</label>
        <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion', $provincia->descripcion) }}" class="form-control @error('descripcion') is-invalid @enderror" required maxlength="250">
        @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="btn-group-custom">
    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('provincias.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
</form>
@endsection
