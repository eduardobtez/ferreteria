@extends('layout')

@section('title', 'Provincias')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Listado de Provincias</h2>
    <a href="{{ route('provincias.create') }}" class="btn btn-new-primary">Nueva Provincia</a>
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
        @forelse($provincias as $provincia)
        <tr>
            <td>{{ $provincia->id_provincia }}</td>
            <td>{{ $provincia->descripcion }}</td>
            <td>
                <a href="{{ route('provincias.edit', $provincia->id_provincia) }}" class="btn btn-sm btn-warning" title="Editar">
                    <i class="bi bi-pencil-square"></i></a>
                <form action="{{ route('provincias.destroy', $provincia->id_provincia) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar provincia?');">
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
            <td colspan="3" class="text-center">No hay provincias registradas.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $provincias->links('pagination::bootstrap-5') }}
</div>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
