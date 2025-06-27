<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Listar marcas
Route::get('/marcas', function () {
    $marcas = DB::table('marcas')->get();
    return view('marcas.index', compact('marcas'));
});

// Formulario crear marca
Route::get('/marcas/crear', function () {
    return view('marcas.crear');
});

// Guardar nueva marca
Route::post('/marcas', function (Request $request) {
    $request->validate([
        'marcas_descripcion' => 'required|string|max:100|unique:marcas,marcas_descripcion',
    ]);

    DB::table('marcas')->insert([
        'marcas_descripcion' => $request->marcas_descripcion,
    ]);

    return redirect('/marcas')->with('success', 'Marca creada correctamente');
});
