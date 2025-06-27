@extends('layout')

@section('titulo', 'Nuevo Producto')

@section('contenido')
    <h2 class="mb-4">Nuevo Producto</h2>

    <form action="/productos" method="POST" novalidate>
        @csrf

        <div class="mb-3">
            <label>Descripción</label>
            <input type="text" name="descripcion" class="form-control" required maxlength="255" value="{{ old('descripcion') }}">
        </div>

        <div class="mb-3">
            <label>Marca</label>
            <select name="marca" class="form-control" required>
                <option value="">Seleccionar</option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id }}" {{ old('marca') == $marca->id ? 'selected' : '' }}>
                        {{ $marca->marcas_descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Medida</label>
            <select name="medida" class="form-control" required>
                <option value="">Seleccionar</option>
                @foreach ($medidas as $medida)
                    <option value="{{ $medida->id }}" {{ old('medida') == $medida->id ? 'selected' : '' }}>
                        {{ $medida->descripcion }} ({{ $medida->abreviatura }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Cantidad</label>
            <input type="number" name="cantidad" class="form-control" required min="0" value="{{ old('cantidad') }}">
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number" name="precios" class="form-control" required min="0" step="0.01" value="{{ old('precios') }}">
        </div>

        <div class="mb-3">
            <label>Proveedor</label>
            <select name="proveedor" class="form-control" required>
                <option value="">Seleccionar</option>
                @foreach ($proveedores as $prov)
                    <option value="{{ $prov->id }}" {{ old('proveedor') == $prov->id ? 'selected' : '' }}>
                        {{ $prov->razonsocial }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-custom">Guardar</button>
        <a href="/productos" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
