<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ferretería - @yield('title')</title>

    <!-- Fuente Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Boldonse&family=Rubik:ital,wght@0,300..900;1,300..900&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Iconos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body  class="dark-mode">
>

    <!-- Botón de cambio de tema -->
    <button id="theme-toggle" aria-label="Cambiar tema">
        <i class="fas fa-sun d-none" id="sun-icon"></i>
        <i class="fas fa-moon" id="moon-icon"></i>
    </button>

    <!-- Sidebar de navegación -->
    <nav id="sidebar" class="d-flex flex-column">
        <a href="{{ url('/') }}" class="nav-link mb-3 fs-4 text-center text-white fw-bold">Ferretería</a>

        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('clientes.index') }}" class="nav-link {{ request()->routeIs('clientes.*') ? 'active' : '' }}">
                    Clientes
                </a>
            </li>
            <li>
                <a href="{{ route('proveedores.index') }}" class="nav-link {{ request()->routeIs('proveedores.*') ? 'active' : '' }}">
                    Proveedores
                </a>
            </li>
            <li>
                <a href="{{ route('productos.index') }}" class="nav-link {{ request()->routeIs('productos.*') ? 'active' : '' }}">
                    Productos
                </a>
            </li>
            <li>
                <a href="{{ route('marcas.index') }}" class="nav-link {{ request()->routeIs('marcas.*') ? 'active' : '' }}">
                    Marcas
                </a>
            </li>
            <li>
                <a href="{{ route('medidas.index') }}" class="nav-link {{ request()->routeIs('medidas.*') ? 'active' : '' }}">
                    Medidas
                </a>
            </li>
            <li>
                <a href="{{ route('provincias.index') }}" class="nav-link {{ request()->routeIs('provincias.*') ? 'active' : '' }}">
                    Provincias
                </a>
            </li>
            <li>
                <a href="{{ route('condicion.index') }}" class="nav-link {{ request()->routeIs('condicion.*') ? 'active' : '' }}">
                    Condición IVA
                </a>
            </li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <main id="content">
        @yield('content')
    </main>

    <!-- JavaScript para el cambio de tema -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const body = document.body;
            const toggleBtn = document.getElementById('theme-toggle');
            const sunIcon = document.getElementById('sun-icon');
            const moonIcon = document.getElementById('moon-icon');

            function setTheme(theme) {
                if (theme === 'light') {
                    body.classList.remove('dark-mode');
                    body.classList.add('light-mode');
                    sunIcon.classList.remove('d-none');
                    moonIcon.classList.add('d-none');
                } else {
                    body.classList.remove('light-mode');
                    body.classList.add('dark-mode');
                    sunIcon.classList.add('d-none');
                    moonIcon.classList.remove('d-none');
                }
            }

            const savedTheme = localStorage.getItem('theme') || 'dark';
            setTheme(savedTheme);

            toggleBtn.addEventListener('click', function () {
                const newTheme = body.classList.contains('light-mode') ? 'dark' : 'light';
                setTheme(newTheme);
                localStorage.setItem('theme', newTheme);
            });
        });
    </script>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
