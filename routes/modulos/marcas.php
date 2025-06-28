<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::prefix('marcas')->name('marcas.')->group(function () {

    // Listar marcas
    Route::get('/', function () {
        $marcas = DB::table('marcas')->paginate(10);
        return view('marcas.index', compact('marcas'));
    })->name('index');

    // Formulario crear marca
    Route::get('/create', function () {
        return view('marcas.create');
    })->name('create');

    // Guardar marca
    Route::post('/', function (Request $request) {
        $validated = $request->validate([
            'marcas_descripcion' => 'required|string|max:250',
        ]);

        DB::table('marcas')->insert($validated);

        return redirect()->route('marcas.index')->with('success', 'Marca creada correctamente.');
    })->name('store');

    // Formulario editar marca
    Route::get('/{id}/edit', function ($id) {
        $marca = DB::table('marcas')->where('id_marcas', $id)->first();
        if (!$marca) abort(404);

        return view('marcas.edit', compact('marca'));
    })->name('edit');

    // Actualizar marca
    Route::put('/{id}', function (Request $request, $id) {
        $validated = $request->validate([
            'marcas_descripcion' => 'required|string|max:250',
        ]);

        DB::table('marcas')->where('id_marcas', $id)->update($validated);

        return redirect()->route('marcas.index')->with('success', 'Marca actualizada correctamente.');
    })->name('update');

    // Eliminar marca
    Route::delete('/{id}', function ($id) {
        DB::table('marcas')->where('id_marcas', $id)->delete();

        return redirect()->route('marcas.index')->with('success', 'Marca eliminada correctamente.');
    })->name('destroy');

});
