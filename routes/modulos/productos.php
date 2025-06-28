<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::prefix('productos')->name('productos.')->group(function () {

    // Listar productos con joins para mostrar marcas, medidas y proveedores
    Route::get('/', function () {
        $productos = DB::table('productos')
            ->join('marcas', 'productos.rela_marcas', '=', 'marcas.id_marcas')
            ->join('medidas', 'productos.rela_medidas', '=', 'medidas.id_medida')
            ->join('proveedores', 'productos.rela_proveedor', '=', 'proveedores.id_proveedores')
            ->select(
                'productos.*',
                'marcas.marcas_descripcion',
                'medidas.descripcion as medida_descripcion',
                'medidas.abreviatura',
                'proveedores.razon_social as proveedor_razon_social'
            )
            ->paginate(10);
        return view('productos.index', compact('productos'));
    })->name('index');

    // Mostrar formulario crear
    Route::get('/create', function () {
        $marcas = DB::table('marcas')->orderBy('marcas_descripcion')->get();
        $medidas = DB::table('medidas')->where('activo', 1)->orderBy('descripcion')->get();
        $proveedores = DB::table('proveedores')->orderBy('razon_social')->get();

        return view('productos.create', compact('marcas', 'medidas', 'proveedores'));
    })->name('create');

    // Guardar producto
    Route::post('/', function (Request $request) {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:250',
            'rela_marcas' => 'required|integer|exists:marcas,id_marcas',
            'rela_medidas' => 'required|integer|exists:medidas,id_medida',
            'cantidad_actual' => 'required|integer|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'precio_compra' => 'required|numeric|min:0',
            'porcentaje_utilidad' => 'required|numeric|min:0',
            'rela_proveedor' => 'required|integer|exists:proveedores,id_proveedores',
            'cantidad_minima' => 'required|integer|min:0',
        ]);

        DB::table('productos')->insert($validated);

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    })->name('store');

    // Mostrar formulario editar
    Route::get('/{id}/edit', function ($id) {
        $producto = DB::table('productos')->where('id_productos', $id)->first();
        if (!$producto) {
            abort(404);
        }
        $marcas = DB::table('marcas')->orderBy('marcas_descripcion')->get();
        $medidas = DB::table('medidas')->where('activo', 1)->orderBy('descripcion')->get();
        $proveedores = DB::table('proveedores')->orderBy('razon_social')->get();

        return view('productos.edit', compact('producto', 'marcas', 'medidas', 'proveedores'));
    })->name('edit');

    // Actualizar producto
    Route::put('/{id}', function (Request $request, $id) {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:250',
            'rela_marcas' => 'required|integer|exists:marcas,id_marcas',
            'rela_medidas' => 'required|integer|exists:medidas,id_medida',
            'cantidad_actual' => 'required|integer|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'precio_compra' => 'required|numeric|min:0',
            'porcentaje_utilidad' => 'required|numeric|min:0',
            'rela_proveedor' => 'required|integer|exists:proveedores,id_proveedores',
            'cantidad_minima' => 'required|integer|min:0',
        ]);

        DB::table('productos')->where('id_productos', $id)->update($validated);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    })->name('update');

    // Eliminar producto
    Route::delete('/{id}', function ($id) {
        DB::table('productos')->where('id_productos', $id)->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    })->name('destroy');
});
