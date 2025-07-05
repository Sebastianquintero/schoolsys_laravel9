<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación</title>
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
        <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
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

<body class="bg-dark ">
    <section>
        <div class="row g-0">
            <div class="col-lg-12 d-flex flex-column align-items-end min-vh-100">

                <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
                    <h1 class="font-weight-bold mb-4">Bienvenido</h1>

                    <!-- Inicio de formulario, Con Label, Input -->
                    <div class="container d-flex justify-content-center align-items-center vh-100">
                        <div class="form-container p-4 bg-dark rounded shadow-lg" style="width: 350px;">

                            @if ($errors->any())
                                <div class="alert alert-danger">{{ $errors->first() }}</div>
                            @endif

                            <form method="POST" action="{{ route('password.reset') }}">
                                @csrf
                                <input type="hidden" name="email" value="{{ session('email') }}">

                                <div class="mb-3">
                                    <label for="codigo" class="form-label">Código recibido</label>
                                    <input type="text" name="codigo" id="codigo" required class="form-control"
                                        maxlength="4">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label font-weight-bold mb-3">Nueva
                                        Contraseña</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password"
                                            class="form-control bg-dark-x border-0 mt-3"
                                            placeholder="Ingrese su contraseña" required>
                                        <span class="input-group-text bg-dark-x border-0 mt-3" style="cursor:pointer"
                                            onclick="togglePassword()">
                                            👁️
                                        </span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label font-weight-bold mb-3">Confirmar
                                        contraseña</label>
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            required class="form-control bg-dark-x border-0 mt-3" placeholder="Confirmar contraseña">
                                        <span class="input-group-text bg-dark-x border-0 mt-3" style="cursor:pointer"
                                            onclick="togglePassword()">
                                            👁️
                                        </span>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success w-100">Restablecer contraseña</button>
                                <script>
                                    function togglePassword() {
                                        const input = document.getElementById('password');
                                        input.type = input.type === 'password' ? 'text' : 'password';
                                    }
                                </script>
                            </form>
                        </div>
                        <!-- Fin del formulario -->
                    </div>
                </div>
            </div>
        </div>

    </section>
</body>

<!-- Archivos JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/jquery-validation-unobtrusive@3.2.11/dist/jquery.validate.unobtrusive.min.js"></script>

</html>