<?php

namespace App\Http\Controllers;

use App\Models\Disfraces;
use Illuminate\Http\Request;

class DisfracesController extends Controller
{
    public function index()
    {
        $alquileres = Disfraces::all();
        return view('alquileres.index', compact('alquileres'));
    }

    public function create()
    {
        return view('alquileres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'disfraz' => 'required|max:50',
            'talla' => 'required|max:20',
            'cliente' => 'required|max:50',
            'telefono' => 'required|max:20',
            'fecha_devolucion' => 'nullable|date',
        ]);

        Disfraces::create([
            'disfraz' => $request->disfraz,
            'talla' => $request->talla,
            'cliente' => $request->cliente,
            'telefono' => $request->telefono,
            'fecha_devolucion' => $request->fecha_devolucion,
            'estado' => 'alquilado',
        ]);

        return redirect()->route('alquileres.index')
            ->with('success', 'Alquiler registrado correctamente.');
    }

    public function edit(Disfraces $alquiler)
    {
        return view('alquileres.edit', compact('alquiler'));
    }
    public function update(Request $request, Disfraces $alquiler)
    {
        $request->validate([
            'disfraz' => 'required|max:50',
            'talla' => 'required|max:20',
            'cliente' => 'required|max:50',
            'telefono' => 'required|max:20',
            'fecha_devolucion' => 'nullable|date',
            'estado' => 'required|in:alquilado,devuelto,atrasado',
        ]);

        $alquiler->update([
            'disfraz' => $request->disfraz,
            'talla' => $request->talla,
            'cliente' => $request->cliente,
            'telefono' => $request->telefono,
            'fecha_devolucion' => $request->fecha_devolucion,
            'estado' => $request->estado,
        ]);

        return redirect()->route('alquileres.index')
            ->with('success', 'Alquiler actualizado correctamente.');
    }

    public function destroy(Disfraces $alquiler)
    {
        // NO se elimina: se conserva historial
        $alquiler->update([
            'estado' => 'devuelto'
        ]);

        return redirect()->route('alquileres.index')
            ->with('success', 'Alquiler marcado como devuelto.');
    }
}
