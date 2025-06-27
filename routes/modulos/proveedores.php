<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Listar proveedores
Route::get('/proveedores', function () {
    $proveedores = DB::table('proveedores')
        ->join('condicion', 'proveedores.condicioniva', '=', 'condicion.id')
        ->select('proveedores.*', 'condicion.descripcion as condicion_desc')
        ->get();

    return view('proveedores.index', compact('proveedores'));
});

// Formulario crear proveedor
Route::get('/proveedores/crear', function () {
    $condiciones = DB::table('condicion')->get();
    return view('proveedores.crear', compact('condiciones'));
});

// Guardar proveedor
Route::post('/proveedores', function (Request $request) {
    $request->validate([
        'razonsocial' => 'required|string|max:100',
        'telefonocontacto' => 'required|string|max:20',
        'personacontacto' => 'required|string|max:100',
        'cuit' => ['required', 'regex:/^[0-9]{2}-[0-9]{8}-[0-9]{1}$/', 'unique:proveedores,cuit'],
        'condicioniva' => 'required|integer',
    ]);

    DB::table('proveedores')->insert([
        'razonsocial' => $request->razonsocial,
        'telefonocontacto' => $request->telefonocontacto,
        'personacontacto' => $request->personacontacto,
        'cuit' => $request->cuit,
        'condicioniva' => $request->condicioniva,
    ]);

    return redirect('/proveedores')->with('success', 'Proveedor creado correctamente');
});
