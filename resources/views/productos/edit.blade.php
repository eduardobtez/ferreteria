@extends('layout')

@section('title', 'Editar Producto')

@section('content')
<h2>Editar Producto</h2>

<form action="{{ route('productos.update', $producto->id_productos) }}" method="POST" novalidate>
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción *</label>
        <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion', $producto->descripcion) }}" class="form-control @error('descripcion') is-invalid @enderror" required maxlength="250">
        @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="rela_marcas" class="form-label">Marca *</label>
        <select id="rela_marcas" name="rela_marcas" class="form-select @error('rela_marcas') is-invalid @enderror" required>
            <option value="">Seleccione marca</option>
            @foreach($marcas as $marca)
            <option value="{{ $marca->id_marcas }}" {{ old('rela_marcas', $producto->rela_marcas) == $marca->id_marcas ? 'selected' : '' }}>
                {{ $marca->marcas_descripcion }}
            </option>
            @endforeach
        </select>
        @error('rela_marcas')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="rela_medidas" class="form-label">Medida *</label>
        <select id="rela_medidas" name="rela_medidas" class="form-select @error('rela_medidas') is-invalid @enderror" required>
            <option value="">Seleccione medida</option>
            @foreach($medidas as $medida)
            <option value="{{ $medida->id_medida }}" {{ old('rela_medidas', $producto->rela_medidas) == $medida->id_medida ? 'selected' : '' }}>
                {{ $medida->descripcion }} ({{ $medida->abreviatura }})
            </option>
            @endforeach
        </select>
        @error('rela_medidas')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cantidad_actual" class="form-label">Cantidad Actual *</label>
        <input type="number" id="cantidad_actual" name="cantidad_actual" value="{{ old('cantidad_actual', $producto->cantidad_actual) }}" class="form-control @error('cantidad_actual') is-invalid @enderror" required min="0">
        @error('cantidad_actual')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="precio_venta" class="form-label">Precio Venta *</label>
        <input type="number" step="0.01" id="precio_venta" name="precio_venta" value="{{ old('precio_venta', $producto->precio_venta) }}" class="form-control @error('precio_venta') is-invalid @enderror" required min="0">
        @error('precio_venta')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="precio_compra" class="form-label">Precio Compra *</label>
        <input type="number" step="0.01" id="precio_compra" name="precio_compra" value="{{ old('precio_compra', $producto->precio_compra) }}" class="form-control @error('precio_compra') is-invalid @enderror" required min="0">
        @error('precio_compra')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="porcentaje_utilidad" class="form-label">% Utilidad *</label>
        <input type="number" step="0.01" id="porcentaje_utilidad" name="porcentaje_utilidad" value="{{ old('porcentaje_utilidad', $producto->porcentaje_utilidad) }}" class="form-control @error('porcentaje_utilidad') is-invalid @enderror" required min="0">
        @error('porcentaje_utilidad')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="rela_proveedor" class="form-label">Proveedor *</label>
        <select id="rela_proveedor" name="rela_proveedor" class="form-select @error('rela_proveedor') is-invalid @enderror" required>
            <option value="">Seleccione proveedor</option>
            @foreach($proveedores as $proveedor)
            <option value="{{ $proveedor->id_proveedores }}" {{ old('rela_proveedor', $producto->rela_proveedor) == $proveedor->id_proveedores ? 'selected' : '' }}>
                {{ $proveedor->razon_social }}
            </option>
            @endforeach
        </select>
        @error('rela_proveedor')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cantidad_minima" class="form-label">Cantidad Mínima *</label>
        <input type="number" id="cantidad_minima" name="cantidad_minima" value="{{ old('cantidad_minima', $producto->cantidad_minima) }}" class="form-control @error('cantidad_minima') is-invalid @enderror" required min="0">
        @error('cantidad_minima')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
