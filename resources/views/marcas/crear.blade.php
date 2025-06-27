@extends('layout')

@section('titulo', 'Nueva Marca')

@section('contenido')
    <h2 class="mb-4">Nueva Marca</h2>

    <form action="/marcas" method="POST" novalidate>
        @csrf

        <div class="mb-3">
            <label>Descripción de la Marca</label>
            <input type="text" name="marcas_descripcion" class="form-control" required maxlength="100"
                   pattern="[A-Za-zÁÉÍÓÚÑáéíóúñ0-9\s]+" value="{{ old('marcas_descripcion') }}">
        </div>

        <button type="submit" class="btn btn-custom">Guardar</button>
        <a href="/marcas" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
