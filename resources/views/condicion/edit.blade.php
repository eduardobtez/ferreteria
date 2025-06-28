@extends('layout')

@section('title', 'Editar Condición IVA')

@section('content')
<h2>Editar Condición IVA</h2>

<form action="{{ route('condicion.update', $condicion->id_condicioniva) }}" method="POST" novalidate>
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción *</label>
        <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion', $condicion->descripcion) }}" class="form-control @error('descripcion') is-invalid @enderror" required maxlength="250">
        @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('condicion.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
