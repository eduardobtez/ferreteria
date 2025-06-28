@extends('layout')

@section('title', 'Proveedores')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Listado de Proveedores</h2>
    <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Nuevo Proveedor</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-dark table-striped table-hover align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Razón Social</th>
            <th>Teléfono Contacto</th>
            <th>Persona Contacto</th>
            <th>CUIT</th>
            <th>Condición IVA</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($proveedores as $proveedor)
        <tr>
            <td>{{ $proveedor->id_proveedores }}</td>
            <td>{{ $proveedor->razon_social }}</td>
            <td>{{ $proveedor->telefono_contacto }}</td>
            <td>{{ $proveedor->persona_contacto }}</td>
            <td>{{ $proveedor->cuit }}</td>
            <td>{{ $proveedor->condicioniva }}</td>
            <td>
                <a href="{{ route('proveedores.edit', $proveedor->id_proveedores) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('proveedores.destroy', $proveedor->id_proveedores) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar proveedor?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No hay proveedores registrados.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $proveedores->links('pagination::bootstrap-5') }}
</div>
@endsection
