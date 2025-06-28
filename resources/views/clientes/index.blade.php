@extends('layout')

@section('title', 'Clientes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Listado de Clientes</h2>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Nuevo Cliente</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-dark table-striped table-hover align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>DNI</th>
            <th>Fecha Nac.</th>
            <th>Provincia</th>
            <th>Localidad</th>
            <th>Dirección</th>
            <th>CUIT</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Condición IVA</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($clientes as $cliente)
        <tr>
            <td>{{ $cliente->id_clientes }}</td>
            <td>{{ $cliente->nombre }} {{ $cliente->apellido }}</td>
            <td>{{ $cliente->dni }}</td>
            <td>{{ $cliente->fechanacimiento }}</td>
            <td>{{ $cliente->provincia }}</td>
            <td>{{ $cliente->localidad }}</td>
            <td>{{ $cliente->direccion }}</td>
            <td>{{ $cliente->cuit }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ $cliente->condicioniva }}</td>
            <td>
                <a href="{{ route('clientes.edit', $cliente->id_clientes) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('clientes.destroy', $cliente->id_clientes) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar cliente?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="12" class="text-center">No hay clientes registrados.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $clientes->links('pagination::bootstrap-5') }}
</div>
@endsection
