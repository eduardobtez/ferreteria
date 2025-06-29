<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::prefix('proveedores')->name('proveedores.')->group(function () {

    Route::get('/', function () {
        $proveedores = DB::table('proveedores')
            ->join('condicion', 'proveedores.rela_condicioniva', '=', 'condicion.id_condicioniva')
            ->select('proveedores.*', 'condicion.descripcion as condicioniva')
            ->paginate(10);
        return view('proveedores.index', compact('proveedores'));
    })->name('index');

    Route::get('/create', function () {
        $condiciones = DB::table('condicion')->orderBy('descripcion')->get();
        return view('proveedores.create', compact('condiciones'));
    })->name('create');

    Route::post('/', function (Request $request) {
        $validated = $request->validate([
            'razon_social' => ['required', 'string', 'max:250', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'],
            'telefono_contacto' => ['required', 'regex:/^\d{10,11}$/'],
            'persona_contacto' => ['required', 'string', 'max:250', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'],
            'cuit' => ['required', 'regex:/^\d{11}$/'],
            'rela_condicioniva' => 'required|integer|exists:condicion,id_condicioniva',
        ]);

        DB::table('proveedores')->insert($validated);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado correctamente.');
    })->name('store');

    Route::get('/{id}/edit', function ($id) {
        $proveedor = DB::table('proveedores')->where('id_proveedores', $id)->first();
        if (!$proveedor) abort(404);
        $condiciones = DB::table('condicion')->orderBy('descripcion')->get();
        return view('proveedores.edit', compact('proveedor', 'condiciones'));
    })->name('edit');

    Route::put('/{id}', function (Request $request, $id) {
        $validated = $request->validate([
            'razon_social' => ['required', 'string', 'max:250', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'],
            'telefono_contacto' => ['required', 'regex:/^\d{10,11}$/'],
            'persona_contacto' => ['required', 'string', 'max:250', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'],
            'cuit' => ['required', 'regex:/^\d{11}$/'],
            'rela_condicioniva' => 'required|integer|exists:condicion,id_condicioniva',
        ]);

        DB::table('proveedores')->where('id_proveedores', $id)->update($validated);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
    })->name('update');

    Route::delete('/{id}', function ($id) {
        DB::table('proveedores')->where('id_proveedores', $id)->delete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');
    })->name('destroy');
});
