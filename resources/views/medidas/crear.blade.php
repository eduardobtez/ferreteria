@extends('layout')

@section('titulo', 'Nueva Medida')

@section('contenido')
    <h2 class="mb-4">Nueva Medida</h2>

    <form action="/medidas" method="POST" novalidate>
        @csrf

        <div class="mb-3">
            <label>Descripción</label>
            <input type="text" name="descripcion" class="form-control" required maxlength="100"
                   pattern="[A-Za-zÁÉÍÓÚÑáéíóúñ0-9\s]+" value="{{ old('descripcion') }}">
        </div>

        <div class="mb-3">
            <label>Abreviatura</label>
            <input type="text" name="abreviatura" class="form-control" required maxlength="10"
                   pattern="[A-Za-z0-9]+" value="{{ old('abreviatura') }}">
        </div>

        <div class="mb-3">
            <label>¿Activo?</label>
            <select name="activo" class="form-control" required>
                <option value="">Seleccionar</option>
                <option value="1" {{ old('activo') == '1' ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ old('activo') == '0' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-custom">Guardar</button>
        <a href="/medidas" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
