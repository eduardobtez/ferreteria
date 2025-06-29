@extends('layout')

@section('title', 'Editar Proveedor')

@section('content')
<h2>Editar Proveedor</h2>

<form action="{{ route('proveedores.update', $proveedor->id_proveedores) }}" method="POST" novalidate>
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="razon_social" class="form-label">Razón Social *</label>
        <input type="text" id="razon_social" name="razon_social" value="{{ old('razon_social', $proveedor->razon_social) }}" class="form-control @error('razon_social') is-invalid @enderror" required maxlength="250">
        @error('razon_social')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="telefono_contacto" class="form-label">Teléfono Contacto *</label>
        <input type="text" id="telefono_contacto" name="telefono_contacto" value="{{ old('telefono_contacto', $proveedor->telefono_contacto) }}" class="form-control @error('telefono_contacto') is-invalid @enderror" required maxlength="250">
        @error('telefono_contacto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="persona_contacto" class="form-label">Persona Contacto *</label>
        <input type="text" id="persona_contacto" name="persona_contacto" value="{{ old('persona_contacto', $proveedor->persona_contacto) }}" class="form-control @error('persona_contacto') is-invalid @enderror" required maxlength="250">
        @error('persona_contacto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cuit" class="form-label">CUIT *</label>
        <input type="text" id="cuit" name="cuit" value="{{ old('cuit', $proveedor->cuit) }}" class="form-control @error('cuit') is-invalid @enderror" required maxlength="250">
        @error('cuit')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="rela_condicioniva" class="form-label">Condición IVA *</label>
        <select id="rela_condicioniva" name="rela_condicioniva" class="form-select @error('rela_condicioniva') is-invalid @enderror" required>
            <option value="">Seleccione condición</option>
            @foreach($condiciones as $cond)
            <option value="{{ $cond->id_condicioniva }}" {{ old('rela_condicioniva', $proveedor->rela_condicioniva) == $cond->id_condicioniva ? 'selected' : '' }}>
                {{ $cond->descripcion }}
            </option>
            @endforeach
        </select>
        @error('rela_condicioniva')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="btn-group-custom">
    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
@endsection
