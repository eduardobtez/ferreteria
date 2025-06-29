<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::prefix('medidas')->name('medidas.')->group(function () {

    Route::get('/', function () {
        $medidas = DB::table('medidas')->paginate(10);
        return view('medidas.index', compact('medidas'));
    })->name('index');

    Route::get('/create', function () {
        return view('medidas.create');
    })->name('create');

    Route::post('/', function (Request $request) {
        $validated = $request->validate([
            'descripcion' => [
                'required',
                'max:250',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'
            ],
            'abreviatura' => [
                'required',
                'max:10',
                // Letras, números, y símbolos como %, °, ³, etc.
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9³°\/%\s]+$/'
            ],
            'activo' => 'required|boolean',
        ], [
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.max' => 'Máximo 250 caracteres.',
            'descripcion.regex' => 'Solo se permiten letras y espacios.',

            'abreviatura.required' => 'La abreviatura es obligatoria.',
            'abreviatura.max' => 'Máximo 10 caracteres.',
            'abreviatura.regex' => 'Solo se permiten letras, números y algunos símbolos.',

            'activo.required' => 'Debe indicar si está activa o no.',
            'activo.boolean' => 'Valor inválido.',
        ]);

        DB::table('medidas')->insert($validated);

        return redirect()->route('medidas.index')->with('success', 'Medida creada correctamente.');
    })->name('store');

    Route::get('/{id}/edit', function ($id) {
        $medida = DB::table('medidas')->where('id_medida', $id)->first();
        if (!$medida) abort(404);

        return view('medidas.edit', compact('medida'));
    })->name('edit');

    Route::put('/{id}', function (Request $request, $id) {
        $validated = $request->validate([
            'descripcion' => [
                'required',
                'max:250',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'
            ],
            'abreviatura' => [
                'required',
                'max:10',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9³°\/%\s]+$/'
            ],
            'activo' => 'required|boolean',
        ], [
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.max' => 'Máximo 250 caracteres.',
            'descripcion.regex' => 'Solo se permiten letras y espacios.',

            'abreviatura.required' => 'La abreviatura es obligatoria.',
            'abreviatura.max' => 'Máximo 10 caracteres.',
            'abreviatura.regex' => 'Solo se permiten letras, números y algunos símbolos.',

            'activo.required' => 'Debe indicar si está activa o no.',
            'activo.boolean' => 'Valor inválido.',
        ]);

        DB::table('medidas')->where('id_medida', $id)->update($validated);

        return redirect()->route('medidas.index')->with('success', 'Medida actualizada correctamente.');
    })->name('update');

    Route::delete('/{id}', function ($id) {
        DB::table('medidas')->where('id_medida', $id)->delete();
        return redirect()->route('medidas.index')->with('success', 'Medida eliminada correctamente.');
    })->name('destroy');
});
