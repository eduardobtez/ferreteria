<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

// Incluir archivos de rutas de módulos (se crearán más adelante)
require __DIR__.'/modulos/clientes.php';
require __DIR__.'/modulos/proveedores.php';
require __DIR__.'/modulos/productos.php';
require __DIR__.'/modulos/marcas.php';
require __DIR__.'/modulos/medidas.php';
require __DIR__.'/modulos/provincias.php';
require __DIR__.'/modulos/condicion.php';
