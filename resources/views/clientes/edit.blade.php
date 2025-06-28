@extends('layout')

@section('title', 'Editar Cliente')

@section('content')
<h2>Editar Cliente</h2>

<form action="{{ route('clientes.update', $cliente->id_clientes) }}" method="POST" novalidate>
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre *</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" class="form-control @error('nombre') is-invalid @enderror" required maxlength="250">
        @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido *</label>
        <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $cliente->apellido) }}" class="form-control @error('apellido') is-invalid @enderror" required maxlength="250">
        @error('apellido')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="dni" class="form-label">DNI *</label>
        <input type="text" id="dni" name="dni" value="{{ old('dni', $cliente->dni) }}" class="form-control @error('dni') is-invalid @enderror" required maxlength="250">
        @error('dni')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="fechanacimiento" class="form-label">Fecha de Nacimiento *</label>
        <input type="date" id="fechanacimiento" name="fechanacimiento" value="{{ old('fechanacimiento', $cliente->fechanacimiento) }}" class="form-control @error('fechanacimiento') is-invalid @enderror" required>
        @error('fechanacimiento')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="rela_provincia" class="form-label">Provincia *</label>
        <select id="rela_provincia" name="rela_provincia" class="form-select @error('rela_provincia') is-invalid @enderror" required>
            <option value="">Seleccione provincia</option>
            @foreach($provincias as $prov)
            <option value="{{ $prov->id_provincia }}" {{ old('rela_provincia', $cliente->rela_provincia) == $prov->id_provincia ? 'selected' : '' }}>
                {{ $prov->descripcion }}
            </option>
            @endforeach
        </select>
        @error('rela_provincia')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="localidad" class="form-label">Localidad *</label>
        <input type="text" id="localidad" name="localidad" value="{{ old('localidad', $cliente->localidad) }}" class="form-control @error('localidad') is-invalid @enderror" required maxlength="250">
        @error('localidad')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="direccion" class="form-label">Dirección *</label>
        <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $cliente->direccion) }}" class="form-control @error('direccion') is-invalid @enderror" required maxlength="250">
        @error('direccion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cuit" class="form-label">CUIT *</label>
        <input type="text" id="cuit" name="cuit" value="{{ old('cuit', $cliente->cuit) }}" class="form-control @error('cuit') is-invalid @enderror" required maxlength="250">
        @error('cuit')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email *</label>
        <input type="email" id="email" name="email" value="{{ old('email', $cliente->email) }}" class="form-control @error('email') is-invalid @enderror" required maxlength="250">
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono *</label>
        <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" class="form-control @error('telefono') is-invalid @enderror" required maxlength="250">
        @error('telefono')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="rela_condicioniva" class="form-label">Condición IVA *</label>
        <select id="rela_condicioniva" name="rela_condicioniva" class="form-select @error('rela_condicioniva') is-invalid @enderror" required>
            <option value="">Seleccione condición</option>
            @foreach($condiciones as $cond)
            <option value="{{ $cond->id_condicioniva }}" {{ old('rela_condicioniva', $cliente->rela_condicioniva) == $cond->id_condicioniva ? 'selected' : '' }}>
                {{ $cond->descripcion }}
            </option>
            @endforeach
        </select>
        @error('rela_condicioniva')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
