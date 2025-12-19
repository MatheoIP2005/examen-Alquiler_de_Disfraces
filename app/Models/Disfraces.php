<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disfraces extends Model
{
    protected $table = 'alquileres';

    protected $fillable = [
        'disfraz',
        'talla',
        'cliente',
        'telefono',
        'fecha_alquiler',
        'fecha_devolucion',
        'estado',
    ];

    // Obtener todos los alquileres
    public static function getAlquileres()
    {
        return self::all();
    }

    // Obtener alquiler por ID
    public static function getAlquilerById($id)
    {
        return self::findOrFail($id);
    }

    // Actualizar alquiler
    public static function updateAlquiler($id, array $data)
    {
        $alquiler = self::findOrFail($id);
        $alquiler->update($data);
        return $alquiler;
    }

    // Borrado lógico (historial)
    public static function marcarComoDevuelto(Disfraces $alquiler)
    {
        $alquiler->update([
            'estado' => 'devuelto'
        ]);
    }
}
