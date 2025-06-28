@extends('layout')

@section('title', 'Editar Marca')

@section('content')
<h2>Editar Marca</h2>

<form action="{{ route('marcas.update', $marca->id_marcas) }}" method="POST" novalidate>
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="marcas_descripcion" class="form-label">Descripción *</label>
        <input type="text" id="marcas_descripcion" name="marcas_descripcion" value="{{ old('marcas_descripcion', $marca->marcas_descripcion) }}" class="form-control @error('marcas_descripcion') is-invalid @enderror" required maxlength="250">
        @error('marcas_descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('marcas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
