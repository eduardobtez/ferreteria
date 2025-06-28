@extends('layout')

@section('title', 'Productos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Listado de Productos</h2>
    <a href="{{ route('productos.create') }}" class="btn btn-primary">Nuevo Producto</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-dark table-striped table-hover align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Marca</th>
            <th>Medida</th>
            <th>Cantidad Actual</th>
            <th>Precio Venta</th>
            <th>Precio Compra</th>
            <th>% Utilidad</th>
            <th>Proveedor</th>
            <th>Cantidad Mínima</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($productos as $producto)
        <tr>
            <td>{{ $producto->id_productos }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->marcas_descripcion }}</td>
            <td>{{ $producto->medida_descripcion }} ({{ $producto->abreviatura }})</td>
            <td>{{ $producto->cantidad_actual }}</td>
            <td>${{ number_format($producto->precio_venta, 2) }}</td>
            <td>${{ number_format($producto->precio_compra, 2) }}</td>
            <td>{{ $producto->porcentaje_utilidad }}%</td>
            <td>{{ $producto->proveedor_razon_social }}</td>
            <td>{{ $producto->cantidad_minima }}</td>
            <td>
                <a href="{{ route('productos.edit', $producto->id_productos) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('productos.destroy', $producto->id_productos) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar producto?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="11" class="text-center">No hay productos registrados.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $productos->links('pagination::bootstrap-5') }}
</div>
@endsection
