<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::prefix('condicion')->name('condicion.')->group(function () {

    // Listar condiciones IVA
    Route::get('/', function () {
        $condiciones = DB::table('condicion')->paginate(10);
        return view('condicion.index', compact('condiciones'));
    })->name('index');

    // Formulario crear condición
    Route::get('/create', function () {
        return view('condicion.create');
    })->name('create');

    // Guardar condición
    Route::post('/', function (Request $request) {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:250',
        ]);

        DB::table('condicion')->insert($validated);

        return redirect()->route('condicion.index')->with('success', 'Condición creada correctamente.');
    })->name('store');

    // Formulario editar condición
    Route::get('/{id}/edit', function ($id) {
        $condicion = DB::table('condicion')->where('id_condicioniva', $id)->first();
        if (!$condicion) abort(404);

        return view('condicion.edit', compact('condicion'));
    })->name('edit');

    // Actualizar condición
    Route::put('/{id}', function (Request $request, $id) {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:250',
        ]);

        DB::table('condicion')->where('id_condicioniva', $id)->update($validated);

        return redirect()->route('condicion.index')->with('success', 'Condición actualizada correctamente.');
    })->name('update');

    // Eliminar condición
    Route::delete('/{id}', function ($id) {
        DB::table('condicion')->where('id_condicioniva', $id)->delete();

        return redirect()->route('condicion.index')->with('success', 'Condición eliminada correctamente.');
    })->name('destroy');

});
