<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('titulo', 'Ferretería')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff;
            color: #000000;
        }
        .sidebar {
            height: 100vh;
            background-color: #000000;
            padding: 1rem;
            color: #ffffff;
        }
        .sidebar a {
            color: #ffffff;
            display: block;
            margin: 0.5rem 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .main-content {
            padding: 2rem;
        }
        .btn-custom {
            background-color: #000000;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <h4>Ferretería</h4>
            <a href="/">Inicio</a>
            <a href="{{ url('/clientes/crear') }}">Clientes</a>
            <a href="{{ url('/proveedores/crear') }}">Proveedores</a>
            <a href="{{ url('/productos/crear') }}">Productos</a>

        </div>
        <div class="main-content w-100">
            @yield('contenido')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
