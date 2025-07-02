<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <!-- Bootstrap desde CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/ScholSys_login.jpg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@600&display=swap" rel="stylesheet">

    <!-- Icon Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- Libraries CSS -->
    <link rel="stylesheet" href="{{ asset('lib/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/lightbox/css/lightbox.min.css') }}">

    <!-- Custom Bootstrap Style -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Template Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Style_login.css') }}">
</head>

<header>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0">ScholSys</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('index') }}" class="nav-item nav-link active">Inicio</a>
                <a href="{{ route('about') }}" class="nav-item nav-link">Información</a>
                <div class="nav-item dropdown">
                    <a href="{{ route('feature') }}" class="nav-link dropdown-toggle"
                        data-bs-toggle="dropdown">Soluciones Educativas</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="{{ route('feature') }}" class="dropdown-item">Solución Academica</a>
                        <a href="{{ route('feature2') }}" class="dropdown-item">Solución Adminstrativa</a>
                        <a href="{{ route('feature3') }}" class="dropdown-item">Solución Electoral</a>

                    </div>
                </div>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contactenos</a>
            </div>
            <a href="{{ route('login') }}" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Login<i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

</header>

<body class="bg-dark">
    <section>
        <div class="row g-0">
            <div class="col-lg-12 d-flex flex-column align-items-end min-vh-100">
                <h1 class="font-weight-bold mb-4">Bienvenido</h1>

                <!-- Formulario de Login -->
                <div class="form-container">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label font-weight-bold mb-3">Correo</label>
                            <input type="email" name="email" id="email" class="form-control bg-dark-x border-0 mt-4"
                                placeholder="Ingrese su correo" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label font-weight-bold mb-3">Contraseña</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password"
                                    class="form-control bg-dark-x border-0 mt-3" placeholder="Ingrese su contraseña"
                                    required>
                                <span class="input-group-text bg-dark-x border-0 mt-3" style="cursor:pointer"
                                    onclick="togglePassword()">
                                    👁️
                                </span>
                            </div>
                            <a href="{{ route('recuperacion_password') }}"
                                class="form-text text-muted text-decoration-none mt-5">¿Olvidaste tu contraseña?</a>
                        </div>

                        <script>
                            function togglePassword() {
                                const input = document.getElementById('password');
                                input.type = input.type === 'password' ? 'text' : 'password';
                            }
                        </script>
                        <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- JS Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('lib/parallax/parallax.min.js') }}"></script>
<script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('js/main.js') }}"></script>

<!-- Crea el alert cuando inicia session o cuando el inicio de sesion no es valido -->

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Acceso exitoso!',
            text: '{{ session('success') }}',
            confirmButtonText: 'Continuar'
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error de autenticación',
            text: '{{ session('error') }}',
            confirmButtonText: 'Intentar de nuevo'
        });
    </script>
@endif

</html>