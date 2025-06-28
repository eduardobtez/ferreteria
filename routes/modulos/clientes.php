<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::prefix('clientes')->name('clientes.')->group(function () {

    // Listar clientes
    Route::get('/', function () {
        $clientes = DB::table('clientes')
            ->join('provincias', 'clientes.rela_provincia', '=', 'provincias.id_provincia')
            ->join('condicion', 'clientes.rela_condicioniva', '=', 'condicion.id_condicioniva')
            ->select('clientes.*', 'provincias.descripcion as provincia', 'condicion.descripcion as condicioniva')
            ->paginate(10);
        return view('clientes.index', compact('clientes'));
    })->name('index');

    // Mostrar formulario crear
    Route::get('/create', function () {
        $provincias = DB::table('provincias')->orderBy('descripcion')->get();
        $condiciones = DB::table('condicion')->orderBy('descripcion')->get();
        return view('clientes.create', compact('provincias', 'condiciones'));
    })->name('create');

    // Guardar cliente
    Route::post('/', function (Request $request) {
        $validated = $request->validate([
            'nombre' => 'required|string|max:250',
            'apellido' => 'required|string|max:250',
            'dni' => 'required|string|max:250',
            'fechanacimiento' => 'required|date',
            'rela_provincia' => 'required|integer|exists:provincias,id_provincia',
            'localidad' => 'required|string|max:250',
            'direccion' => 'required|string|max:250',
            'cuit' => 'required|string|max:250',
            'email' => 'required|email|max:250',
            'telefono' => 'required|string|max:250',
            'rela_condicioniva' => 'required|integer|exists:condicion,id_condicioniva',
        ]);

        DB::table('clientes')->insert($validated);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    })->name('store');

    // Mostrar formulario editar
    Route::get('/{id}/edit', function ($id) {
        $cliente = DB::table('clientes')->where('id_clientes', $id)->first();
        if (!$cliente) {
            abort(404);
        }
        $provincias = DB::table('provincias')->orderBy('descripcion')->get();
        $condiciones = DB::table('condicion')->orderBy('descripcion')->get();

        return view('clientes.edit', compact('cliente', 'provincias', 'condiciones'));
    })->name('edit');

    // Actualizar cliente
    Route::put('/{id}', function (Request $request, $id) {
        $validated = $request->validate([
            'nombre' => 'required|string|max:250',
            'apellido' => 'required|string|max:250',
            'dni' => 'required|string|max:250',
            'fechanacimiento' => 'required|date',
            'rela_provincia' => 'required|integer|exists:provincias,id_provincia',
            'localidad' => 'required|string|max:250',
            'direccion' => 'required|string|max:250',
            'cuit' => 'required|string|max:250',
            'email' => 'required|email|max:250',
            'telefono' => 'required|string|max:250',
            'rela_condicioniva' => 'required|integer|exists:condicion,id_condicioniva',
        ]);

        $updated = DB::table('clientes')->where('id_clientes', $id)->update($validated);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    })->name('update');

    // Eliminar cliente
    Route::delete('/{id}', function ($id) {
        DB::table('clientes')->where('id_clientes', $id)->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    })->name('destroy');
});
