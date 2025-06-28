<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::prefix('provincias')->name('provincias.')->group(function () {

    // Listar provincias
    Route::get('/', function () {
        $provincias = DB::table('provincias')->paginate(10);
        return view('provincias.index', compact('provincias'));
    })->name('index');

    // Formulario crear provincia
    Route::get('/create', function () {
        return view('provincias.create');
    })->name('create');

    // Guardar provincia
    Route::post('/', function (Request $request) {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:250',
        ]);

        DB::table('provincias')->insert($validated);

        return redirect()->route('provincias.index')->with('success', 'Provincia creada correctamente.');
    })->name('store');

    // Formulario editar provincia
    Route::get('/{id}/edit', function ($id) {
        $provincia = DB::table('provincias')->where('id_provincia', $id)->first();
        if (!$provincia) abort(404);

        return view('provincias.edit', compact('provincia'));
    })->name('edit');

    // Actualizar provincia
    Route::put('/{id}', function (Request $request, $id) {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:250',
        ]);

        DB::table('provincias')->where('id_provincia', $id)->update($validated);

        return redirect()->route('provincias.index')->with('success', 'Provincia actualizada correctamente.');
    })->name('update');

    // Eliminar provincia
    Route::delete('/{id}', function ($id) {
        DB::table('provincias')->where('id_provincia', $id)->delete();

        return redirect()->route('provincias.index')->with('success', 'Provincia eliminada correctamente.');
    })->name('destroy');

});
