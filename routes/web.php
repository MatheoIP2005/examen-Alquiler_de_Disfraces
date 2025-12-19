<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisfracesController;

Route::get('/', fn () => redirect()->route('alquileres.index'));

Route::resource('alquileres', DisfracesController::class)
    ->parameters(['alquileres' => 'alquiler']);
