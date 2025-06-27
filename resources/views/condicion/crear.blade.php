@extends('layout')

@section('titulo', 'Nueva Condición IVA')

@section('contenido')
    <h2 class="mb-4">Nueva Condición IVA</h2>

    <form action="/condicion" method="POST" novalidate>
        @csrf

        <div class="mb-3">
            <label>Descripción</label>
            <input type="text" name="descripcion" class="form-control" required maxlength="100"
                   pattern="[A-Za-zÁÉÍÓÚÑáéíóúñ\s]+" value="{{ old('descripcion') }}">
        </div>

        <button type="submit" class="btn btn-custom">Guardar</button>
        <a href="/condicion" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
