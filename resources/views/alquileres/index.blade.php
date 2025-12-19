@extends('layouts.app')

@section('titulo', 'Alquileres')

@section('contenido')

    <div class="d-flex justify-content-between mb-3">
        <h1>Alquileres</h1>
        <a href="{{ route('alquileres.create') }}" class="btn btn-primary">Nuevo</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Disfraz</th>
                <th>Talla</th>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Fecha alquiler</th>
                <th>Fecha devolución</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            @foreach($alquileres as $alquiler)
                <tr>
                    <td>{{ $alquiler->disfraz }}</td>
                    <td>{{ $alquiler->talla }}</td>
                    <td>{{ $alquiler->cliente }}</td>
                    <td>{{ $alquiler->telefono }}</td>

                    <td>
                        {{ \Carbon\Carbon::parse($alquiler->fecha_alquiler)->format('d/m/Y H:i') }}
                    </td>

                    <td>
                        {{ $alquiler->fecha_devolucion
                            ? \Carbon\Carbon::parse($alquiler->fecha_devolucion)->format('d/m/Y')
                            : '-' }}
                    </td>

                    <td>{{ ucfirst($alquiler->estado) }}</td>

                    <td>
                        <a href="{{ route('alquileres.edit', $alquiler) }}"
                           class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('alquileres.destroy', $alquiler) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-success"
                                    onclick="return confirm('¿Marcar este alquiler como devuelto?')">
                                Marcar devuelto
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
