<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Listar medidas
Route::get('/medidas', function () {
    $medidas = DB::table('medidas')->get();
    return view('medidas.index', compact('medidas'));
});

// Formulario crear medida
Route::get('/medidas/crear', function () {
    return view('medidas.crear');
});

// Guardar medida
Route::post('/medidas', function (Request $request) {
    $request->validate([
        'descripcion' => 'required|string|max:100|unique:medidas,descripcion',
        'abreviatura' => 'required|string|max:10|unique:medidas,abreviatura',
        'activo' => 'required|boolean',
    ]);

    DB::table('medidas')->insert([
        'descripcion' => $request->descripcion,
        'abreviatura' => $request->abreviatura,
        'activo' => $request->activo,
    ]);

    return redirect('/medidas')->with('success', 'Medida creada correctamente');
});
