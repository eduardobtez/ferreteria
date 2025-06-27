<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// IRutas a los módulos
require __DIR__ . '/modulos/clientes.php';
require __DIR__ . '/modulos/proveedores.php';
require __DIR__ . '/modulos/productos.php';
require __DIR__ . '/modulos/marcas.php';
require __DIR__ . '/modulos/medidas.php';

