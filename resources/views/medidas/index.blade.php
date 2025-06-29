@extends('layout')

@section('title', 'Medidas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Listado de Medidas</h2>
    <a href="{{ route('medidas.create') }}" class="btn btn-new-primary">Nueva Medida</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="custom-table table-striped table-hover align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descripción</th>
            <th>Abreviatura</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($medidas as $medida)
        <tr>
            <td>{{ $medida->id_medida }}</td>
            <td>{{ $medida->descripcion }}</td>
            <td>{{ $medida->abreviatura }}</td>
            <td>
                @if($medida->activo)
                    <span class="badge bg-success">Sí</span>
                @else
                    <span class="badge bg-danger">No</span>
                @endif
            </td>
            <td>
                <a href="{{ route('medidas.edit', $medida->id_medida) }}" class="btn btn-sm btn-warning" title="Editar">
                    <i class="bi bi-pencil-square"></i></a>
                <form action="{{ route('medidas.destroy', $medida->id_medida) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar medida?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" title="Eliminar">
                        <i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">No hay medidas registradas.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $medidas->links('pagination::bootstrap-5') }}
</div>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
