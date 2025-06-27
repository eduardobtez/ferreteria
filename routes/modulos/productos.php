<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// Listar productos
Route::get('/productos', function () {
    $productos = DB::table('productos')
        ->join('marcas', 'productos.marca', '=', 'marcas.id')
        ->join('medidas', 'productos.medida', '=', 'medidas.id')
        ->join('proveedores', 'productos.proveedor', '=', 'proveedores.id')
        ->select(
            'productos.*',
            'marcas.marcas_descripcion as marca_desc',
            'medidas.descripcion as medida_desc',
            'medidas.abreviatura',
            'proveedores.razonsocial as proveedor_desc'
        )
        ->get();

    return view('productos.index', compact('productos'));
});

// Formulario crear
Route::get('/productos/crear', function () {
    $marcas = DB::table('marcas')->get();
    $medidas = DB::table('medidas')->where('activo', 1)->get();
    $proveedores = DB::table('proveedores')->get();
    return view('productos.crear', compact('marcas', 'medidas', 'proveedores'));
});

// Guardar producto
Route::post('/productos', function (Request $request) {
    $request->validate([
        'descripcion' => 'required|string|max:255',
        'marca' => 'required|integer',
        'medida' => 'required|integer',
        'cantidad' => 'required|integer|min:0',
        'precios' => 'required|numeric|min:0',
        'proveedor' => 'required|integer',
    ]);

    DB::table('productos')->insert([
        'descripcion' => $request->descripcion,
        'marca' => $request->marca,
        'medida' => $request->medida,
        'cantidad' => $request->cantidad,
        'precios' => $request->precios,
        'proveedor' => $request->proveedor,
    ]);

    return redirect('/productos')->with('success', 'Producto creado correctamente');
});
