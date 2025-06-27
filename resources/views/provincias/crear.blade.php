@extends('layout')

@section('titulo', 'Nueva Provincia')

@section('contenido')
    <h2 class="mb-4">Nueva Provincia</h2>

    <form action="/provincias" method="POST" novalidate>
        @csrf

        <div class="mb-3">
            <label>Descripción</label>
            <input type="text" name="descripcion" class="form-control" required maxlength="100"
                   pattern="[A-Za-zÁÉÍÓÚÑáéíóúñ\s]+" value="{{ old('descripcion') }}">
        </div>

        <button type="submit" class="btn btn-custom">Guardar</button>
        <a href="/provincias" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
