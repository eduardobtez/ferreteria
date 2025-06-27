<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Listar clientes
Route::get('/clientes', function () {
    $clientes = DB::table('clientes')
        ->join('provincias', 'clientes.provincia', '=', 'provincias.id')
        ->join('condicion', 'clientes.condicioniva', '=', 'condicion.id')
        ->select('clientes.*', 'provincias.descripcion as provincia_desc', 'condicion.descripcion as condicion_desc')
        ->get();

    return view('clientes.index', compact('clientes'));
});

// Formulario crear cliente
Route::get('/clientes/crear', function () {
    $provincias = DB::table('provincias')->get();
    $condiciones = DB::table('condicion')->get();
    return view('clientes.crear', compact('provincias', 'condiciones'));
});

// Guardar cliente
Route::post('/clientes', function (Request $request) {
    $request->validate([
        'nombre' => 'required|string|max:100',
        'apellido' => 'required|string|max:100',
        'dni' => 'required|digits:8|unique:clientes,dni',
        'fechanacimiento' => 'required|date',
        'provincia' => 'required|integer',
        'localidad' => 'required|string|max:100',
        'direccion' => 'required|string|max:255',
        'cuit' => ['required', 'regex:/^[0-9]{2}-[0-9]{8}-[0-9]{1}$/', 'unique:clientes,cuit'],
        'email' => 'required|email|max:100',
        'telefono' => 'required|string|max:20',
        'condicioniva' => 'required|integer',
    ]);

    DB::table('clientes')->insert([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'dni' => $request->dni,
        'fechanacimiento' => $request->fechanacimiento,
        'provincia' => $request->provincia,
        'localidad' => $request->localidad,
        'direccion' => $request->direccion,
        'cuit' => $request->cuit,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'condicioniva' => $request->condicioniva,
    ]);

    return redirect('/clientes')->with('success', 'Cliente creado correctamente');
});
