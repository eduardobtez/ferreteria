<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Listar condiciones IVA
Route::get('/condicion', function () {
    $condiciones = DB::table('condicion')->get();
    return view('condicion.index', compact('condiciones'));
});

// Formulario crear condición IVA
Route::get('/condicion/crear', function () {
    return view('condicion.crear');
});

// Guardar condición IVA
Route::post('/condicion', function (Request $request) {
    $request->validate([
        'descripcion' => 'required|string|max:100|unique:condicion,descripcion',
    ]);

    DB::table('condicion')->insert([
        'descripcion' => $request->descripcion,
    ]);

    return redirect('/condicion')->with('success', 'Condición IVA creada correctamente');
});
