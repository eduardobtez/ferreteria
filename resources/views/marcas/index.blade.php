@extends('layout')

@section('title', 'Marcas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Listado de Marcas</h2>
    <a href="{{ route('marcas.create') }}" class="btn btn-new-primary">Nueva Marca</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="custom-table table-striped table-hover align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($marcas as $marca)
        <tr>
            <td>{{ $marca->id_marcas }}</td>
            <td>{{ $marca->marcas_descripcion }}</td>
            <td>
                <a href="{{ route('marcas.edit', $marca->id_marcas) }}" class="btn btn-sm btn-warning" title="Editar">
                    <i class="bi bi-pencil-square"></i></a>
                <form action="{{ route('marcas.destroy', $marca->id_marcas) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar marca?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" title="Eliminar">
                        <i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">No hay marcas registradas.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $marcas->links('pagination::bootstrap-5') }}
</div>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

