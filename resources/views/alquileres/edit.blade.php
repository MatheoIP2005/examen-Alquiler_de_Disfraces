@extends('layouts.app')

@section('titulo', 'Editar Alquiler')

@section('contenido')

    <h1>Editar Alquiler</h1>

    <form action="{{ route('alquileres.update', $alquiler) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Disfraz *</label>
            <input type="text" name="disfraz" class="form-control"
                   value="{{ $alquiler->disfraz }}" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Talla *</label>
            <input type="text" name="talla" class="form-control"
                   value="{{ $alquiler->talla }}" maxlength="20" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cliente *</label>
            <input type="text" name="cliente" class="form-control"
                   value="{{ $alquiler->cliente }}" maxlength="50" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono *</label>
            <input type="text" name="telefono" class="form-control"
                   value="{{ $alquiler->telefono }}" maxlength="20" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha devolución</label>
            <input type="date" name="fecha_devolucion" class="form-control"
                   value="{{ $alquiler->fecha_devolucion }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Estado *</label>
            <select name="estado" class="form-select" required>
                <option value="alquilado" {{ $alquiler->estado == 'alquilado' ? 'selected' : '' }}>Alquilado</option>
                <option value="devuelto" {{ $alquiler->estado == 'devuelto' ? 'selected' : '' }}>Devuelto</option>
                <option value="atrasado" {{ $alquiler->estado == 'atrasado' ? 'selected' : '' }}>Atrasado</option>
            </select>
        </div>

        <a href="{{ route('alquileres.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

@endsection
