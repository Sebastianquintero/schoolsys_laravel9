<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/ScholSys_login.jpg') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome & Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- Libraries CSS -->
    <link rel="stylesheet" href="{{ asset('lib/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/lightbox/css/lightbox.min.css') }}">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body class="welcome">

    <!-- 🟢 HEADER -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                <h1 class="m-0">ScholSys</h1>
            </a>
            <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Cerrar sesión</button>
            </form>
        </nav>
    </header>

    <!-- 🟢 CONTENEDOR DE MÓDULOS -->
    <div class="container-modulos">

        <a href="{{ route('comunica_admin') }}" class="boton_modulo">
            <img src="img/icon/mail-icon.png" alt="Comunicacion">
            <span>Comunicación</span>
        </a>

        <a href="ADMIN-VOTACION.html" class="boton_modulo disabled">
            <img src="img/icon/vote-icon.png" alt="Votación">
            <span>Votación</span>
        </a>

        <a href="{{ route('dashboard_estudiante') }}" class="boton_modulo">
            <img src="img/icon/academico-icon.png" alt="Académico">
            <span>Académico</span>
        </a>

        <a href="{{ route('admin') }}" class="boton_modulo">
            <img src="img/icon/administrativo-icon.png" alt="Administrativo">
            <span>Administrativo</span>
        </a>

    </div>

    <!-- Bootstrap Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>