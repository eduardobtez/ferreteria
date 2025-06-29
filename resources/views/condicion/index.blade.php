@extends('layout')

@section('title', 'Condición IVA')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Listado de Condiciones IVA</h2>
    <a href="{{ route('condicion.create') }}" class="btn btn-new-primary">Nueva Condición</a>
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
        @forelse($condiciones as $condicion)
        <tr>
            <td>{{ $condicion->id_condicioniva }}</td>
            <td>{{ $condicion->descripcion }}</td>
            <td>
                <a href="{{ route('condicion.edit', $condicion->id_condicioniva) }}" class="btn btn-sm btn-warning" title="Editar">
                    <i class="bi bi-pencil-square"></i></a>
                <form action="{{ route('condicion.destroy', $condicion->id_condicioniva) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar condición?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" title="Eliminar">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">No hay condiciones registradas.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $condiciones->links('pagination::bootstrap-5') }}
</div>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">