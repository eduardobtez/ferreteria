<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::prefix('medidas')->name('medidas.')->group(function () {

    // Listar medidas
    Route::get('/', function () {
        $medidas = DB::table('medidas')->paginate(10);
        return view('medidas.index', compact('medidas'));
    })->name('index');

    // Formulario crear medida
    Route::get('/create', function () {
        return view('medidas.create');
    })->name('create');

    // Guardar medida
    Route::post('/', function (Request $request) {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:250',
            'abreviatura' => 'required|string|max:10',
            'activo' => 'required|boolean',
        ]);

        DB::table('medidas')->insert($validated);

        return redirect()->route('medidas.index')->with('success', 'Medida creada correctamente.');
    })->name('store');

    // Formulario editar medida
    Route::get('/{id}/edit', function ($id) {
        $medida = DB::table('medidas')->where('id_medida', $id)->first();
        if (!$medida) abort(404);

        return view('medidas.edit', compact('medida'));
    })->name('edit');

    // Actualizar medida
    Route::put('/{id}', function (Request $request, $id) {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:250',
            'abreviatura' => 'required|string|max:10',
            'activo' => 'required|boolean',
        ]);

        DB::table('medidas')->where('id_medida', $id)->update($validated);

        return redirect()->route('medidas.index')->with('success', 'Medida actualizada correctamente.');
    })->name('update');

    // Eliminar medida
    Route::delete('/{id}', function ($id) {
        DB::table('medidas')->where('id_medida', $id)->delete();

        return redirect()->route('medidas.index')->with('success', 'Medida eliminada correctamente.');
    })->name('destroy');

});
