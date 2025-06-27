<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Listar provincias
Route::get('/provincias', function () {
    $provincias = DB::table('provincias')->get();
    return view('provincias.index', compact('provincias'));
});

// Formulario crear provincia
Route::get('/provincias/crear', function () {
    return view('provincias.crear');
});

// Guardar provincia
Route::post('/provincias', function (Request $request) {
    $request->validate([
        'descripcion' => 'required|string|max:100|unique:provincias,descripcion',
    ]);

    DB::table('provincias')->insert([
        'descripcion' => $request->descripcion,
    ]);

    return redirect('/provincias')->with('success', 'Provincia creada correctamente');
});
