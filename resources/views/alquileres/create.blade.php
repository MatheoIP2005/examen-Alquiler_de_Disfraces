@extends('layouts.app')
@section('titulo', 'Nuevo Alquiler')
@section('contenido')

    <h1>Registrar Alquiler</h1>

    <form action="{{ route('alquileres.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Disfraz *</label>
            <input type="text" name="disfraz" class="form-control" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Talla *</label>
            <input type="text" name="talla" class="form-control" maxlength="20" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cliente *</label>
            <input type="text" name="cliente" class="form-control" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono *</label>
            <input type="text" name="telefono" class="form-control" maxlength="20" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha devolución</label>
            <input type="date" name="fecha_devolucion" class="form-control">
        </div>

        {{-- Estado se asigna automáticamente como "alquilado" --}}

        <a href="{{ route('alquileres.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

@endsection
