@extends('layout')

@section('titulo', 'Nuevo Proveedor')

@section('contenido')
    <h2 class="mb-4">Nuevo Proveedor</h2>

    <form action="/proveedores" method="POST" novalidate>
        @csrf

        <div class="mb-3">
            <label>Razón Social</label>
            <input type="text" name="razonsocial" class="form-control" required maxlength="100" value="{{ old('razonsocial') }}">
        </div>

        <div class="mb-3">
            <label>Teléfono de Contacto</label>
            <input type="text" name="telefonocontacto" class="form-control" required maxlength="20" value="{{ old('telefonocontacto') }}">
        </div>

        <div class="mb-3">
            <label>Persona de Contacto</label>
            <input type="text" name="personacontacto" class="form-control" required maxlength="100" value="{{ old('personacontacto') }}">
        </div>

        <div class="mb-3">
            <label>CUIT</label>
            <input type="text" name="cuit" class="form-control" required pattern="[0-9]{2}-[0-9]{8}-[0-9]{1}" value="{{ old('cuit') }}">
        </div>

        <div class="mb-3">
            <label>Condición IVA</label>
            <select name="condicioniva" class="form-control" required>
                <option value="">Seleccionar</option>
                @foreach ($condiciones as $cond)
                    <option value="{{ $cond->id }}" {{ old('condicioniva') == $cond->id ? 'selected' : '' }}>
                        {{ $cond->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-custom">Guardar</button>
        <a href="/proveedores" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
