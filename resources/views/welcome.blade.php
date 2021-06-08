<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>

<body class="antialiased">
    <section class="hero is-primary is-medium">
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item">
                            <img src="https://bulma.io/images/bulma-type-white.png" alt="Logo">
                        </a>
                        @if (Route::has('login'))
                        <span class="navbar-burger" data-target="navbarMenuHeroA">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        @endif
                    </div>
                    @if (Route::has('login'))
                    <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-end">
                            @auth
                            <a class="navbar-item is-active">
                                Inicio
                            </a>
                            @else
                            <a class="navbar-item">
                                Ayuda
                            </a>
                            @if (Route::has('register'))
                            <a class="navbar-item">
                                Regístrese
                            </a>
                            @endif
                            <span class="navbar-item">
                                <a class="button is-primary is-inverted">
                                    <span class="icon">
                                        <i class="fas fa-sign-in-alt"></i>
                                    </span>
                                    <span>Iniciar Sesión</span>
                                </a>
                            </span>
                            @endauth
                        </div>
                    </div>
                    @endif
                </div>
            </nav>
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            <div class="container has-text-centered">
                <p class="title">
                    Studium
                </p>
                <p class="subtitle">
                    Plataforma de Aprendizaje en Línea
                </p>
            </div>
        </div>

        <!-- Hero footer: will stick at the bottom -->
        <div class="hero-foot">
            <nav class="tabs">
                <div class="container">
                    <ul>
                        <li class="is-active"><a>Información General</a></li>
                        <li><a>En Construcción</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>

    <section class="section is-large">
        <h1 class="title">Proyecto de aprendizaje autónomo</h1>
        <h2 class="subtitle">
            Construido con Laravel 8, Bulma CSS y PostgreSQL 13.
        </h2>
    </section>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                <strong>Studium</strong> por <a href="https://twitter.com/_kimael_">Maikel Carballo</a>. El código fuente tiene licencia
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. 2021.
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}).
            </p>
        </div>
    </footer>
</body>

</html>