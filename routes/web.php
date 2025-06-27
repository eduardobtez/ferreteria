<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Importar rutas del módulo clientes
require __DIR__ . '/modulos/clientes.php';
