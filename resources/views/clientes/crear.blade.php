@extends('layout')

@section('titulo', 'Nuevo Cliente')

@section('contenido')
    <h2 class="mb-4">Nuevo Cliente</h2>

    <form action="/clientes" method="POST" novalidate>
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required maxlength="100" value="{{ old('nombre') }}">
        </div>

        <div class="mb-3">
            <label>Apellido</label>
            <input type="text" name="apellido" class="form-control" required maxlength="100" value="{{ old('apellido') }}">
        </div>

        <div class="mb-3">
            <label>DNI</label>
            <input type="text" name="dni" class="form-control" required pattern="[0-9]{8}" maxlength="8" value="{{ old('dni') }}">
        </div>

        <div class="mb-3">
            <label>Fecha de Nacimiento</label>
            <input type="date" name="fechanacimiento" class="form-control" required value="{{ old('fechanacimiento') }}">
        </div>

        <div class="mb-3">
            <label>Provincia</label>
            <select name="provincia" class="form-control" required>
                <option value="">Seleccionar</option>
                @foreach ($provincias as $prov)
                    <option value="{{ $prov->id }}" {{ old('provincia') == $prov->id ? 'selected' : '' }}>
                        {{ $prov->descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Localidad</label>
            <input type="text" name="localidad" class="form-control" required maxlength="100" value="{{ old('localidad') }}">
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" required maxlength="255" value="{{ old('direccion') }}">
        </div>

        <div class="mb-3">
            <label>CUIT</label>
            <input type="text" name="cuit" class="form-control" required pattern="[0-9]{2}-[0-9]{8}-[0-9]{1}" value="{{ old('cuit') }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required maxlength="100" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" required maxlength="20" value="{{ old('telefono') }}">
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
        <a href="/clientes" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
