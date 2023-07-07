<head>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-nav border-nav nav-general">
        <a class="navbar-brand" href="/"><img src="{{ asset('images/Logo-PokeTeam.png') }}" alt="logo-poketeam"
                class="navbar-brand logo-poketeam">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse d-flex navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center bg-lista gap-5">
                <li class="nav-item">
                    <a class="nav-link color-link bg-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link color-link bg-link" href="#">Acerca de</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link color-link bg-link" href="/mapa">Ver Mapa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link color-link bg-link" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link color-link bg-link" href="/register">Registrarse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link color-link bg-link" href="/login">Iniciar sesión</a>
                </li>

            </ul>
        </div>
    </nav>
</header>
