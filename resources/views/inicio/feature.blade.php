<!DOCTYPE html>
<html lang="en">

<head>
    <!--Vista inicial soluciones academicas -->
    <meta charset="utf-8">
    <title>soluciones ScholSys</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/ScholSys_login.jpg') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Bootstrap (si es personalizado o CSS propio) -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-light px-0 py-2">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <span class="fa fa-phone-alt me-2"></span>
                    <span>+57 311 888 0100</span>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <span class="far fa-envelope me-2"></span>
                    <span>ScholSys@ScholSys.com</span>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <span>Sigue nuestras redes:</span>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


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
                    <a href="{{ route('feature') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Soluciones Educativas</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="{{ route('feature') }}" class="dropdown-item">Solución Academica</a>
                        <a href="{{ route('feature2') }}" class="dropdown-item">Solución Adminstrativa</a>
                        <a href="{{ route('feature3') }}" class="dropdown-item">Solución Electoral</a>

                    </div>
                </div>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contactenos</a>
            </div>
            <a href="{{ route('login') }}" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Soluciones educativas</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.html">inicio</a></li>
                    <li class="breadcrumb-item"><a href="about.html">información</a></li>
                    <li class="breadcrumb-item active" aria-current="page">soluciones educativas</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Feature Start -->
    <div class="container-fluid py-7">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-10 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-user-graduate text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h2>Academica</h2>
                                <span>El módulo académico se encarga de gestionar la información relacionada con el proceso educativo. Incluye funciones como la inscripción de estudiantes, seguimiento del rendimiento académico, gestión de calificaciones y emisión de certificados.
                                    <br><br>
                                    <h3>Beneficios:</h3>
                                    <br><br>
                                    <i class="fa fa-check text-primary"></i> Acceso Rápido a Información: Estudiantes y profesores pueden acceder a sus datos académicos de manera rápida y sencilla, lo que facilita la toma de decisiones informadas.
                                    <br><br>
                                    <i class="fa fa-check text-primary"></i> Mejora en la Comunicación: Las actualizaciones en tiempo real sobre calificaciones y actividades académicas fomentan una mejor comunicación entre estudiantes y docentes.
                                    <br><br>
                                    <i class="fa fa-check text-primary"></i> Optimización del Tiempo: Automatiza tareas administrativas como la creación de horarios y la gestión de asistencias, permitiendo que los docentes se concentren más en la enseñanza.
                                    <br><br>
                                    <br><br>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11 wow fadeIn" data-wow-delay="0.3s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <br><br>
                                <i class="fa fa-user-tie text-primary"></i>
                            </div>
                            <div class="ps-3">
                                
                                <h2>Administrativa</h2>
                                <span>Clita erat ipsum lorem sit sed stet duo justo</span>
                                <span>El módulo administrativo en el contexto de instituciones y colegios es fundamental para la gestión eficiente de recursos, procesos y personal. Este sistema automatizado transforma la manera en que las escuelas operan, facilitando la administración y mejorando la experiencia educativa.
                                    <br><br>
                                    <h3>Beneficios:</h3>
                                    <br><br>
                                    <i class="fa fa-check text-primary"></i>La automatización de tareas administrativas reduce la carga de trabajo manual, permitiendo al personal enfocarse en aspectos más estratégicos de la educación.
                                                                        <br><br>
                                    <i class="fa fa-check text-primary"></i>La disponibilidad instantánea de datos permite a los administradores, docentes y padres acceder a información relevante de manera rápida y sencilla.
                                    <br><br>
                                    <i class="fa fa-check text-primary"></i>Este módulo puede personalizarse según las necesidades específicas de cada institución, permitiendo una adaptación ágil a cambios en las políticas educativas o requerimientos administrativos.
                                    <br><br>
                                    <br><br>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
                        <div class="d-flex">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                                <i class="fa fa-check text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h2>Electoral</h2>
                                <span>Este módulo permite gestionar procesos de votación para elegir representantes estudiantiles o tomar decisiones institucionales. Su automatización asegura un proceso transparente y accesible.
                                    <br><br>
                                    <h3>Beneficios:</h3>
                                    <br><br>
                                    <i class="fa fa-check text-primary"></i>Facilidad de Participación: Los estudiantes pueden votar desde cualquier dispositivo, lo que aumenta la participación en las decisiones institucionales.
                                    <br><br>
                                    <i class="fa fa-check text-primary"></i>Transparencia y Seguridad: La automatización garantiza un manejo seguro de los datos y los resultados, reduciendo el riesgo de manipulación.
                                    <br><br>
                                    <i class="fa fa-check text-primary"></i>Análisis de Resultados: Genera informes detallados que facilitan el análisis de la votación, ayudando a la toma de decisiones futuras.
                                    <br><br>
                                    <br><br>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Facts Start -->
    <div class="container-fluid facts my-5 py-5" data-parallax="scroll" data-image-src="img/movimiento2.jpg">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">123</h1>
                    <span class="fs-5 fw-semi-bold text-light">Clientes</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">123</h1>
                    <span class="fs-5 fw-semi-bold text-light">Instituciones inscritas</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">10</h1>
                    <span class="fs-5 fw-semi-bold text-light">Desarrolladores</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">123</h1>
                    <span class="fs-5 fw-semi-bold text-light">Reconocimientos adquiridos</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fs-5 fw-bold text-primary">Porque elegirnos!</p>
                    <h1 class="display-5 mb-4">Muchas instituciones nos escogen!</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <a class="btn btn-primary py-3 px-4" href="">Buscar mas</a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-6">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                        <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                            <i class="fa fa-check fa-3x text-primary"></i>
                                        </div>
                                        <h4 class="mb-0">100% Satisfacción</h4>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                        <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                            <i class="fa fa-users fa-3x text-primary"></i>
                                        </div>
                                        <h4 class="mb-0">Equipo dedicado</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                            <div class="text-center rounded py-5 px-4" style="box-shadow: 0 0 45px rgba(0,0,0,.08);">
                                <div class="btn-square bg-light rounded-circle mx-auto mb-4" style="width: 90px; height: 90px;">
                                    <i class="fa fa-tools fa-3x text-primary"></i>
                                </div>
                                <h4 class="mb-0">Desarrollo moderno</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Nuestra oficina</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>SENA, Centro de diseño y metrología</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+57 311 888 0100</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>ScholSys@ScholSys.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Servicios</h4>
                    <a class="btn btn-link" href="feature.html">Educativo</a>
                    <a class="btn btn-link" href="feature2.html">Academico</a>
                    <a class="btn btn-link" href="feature3.html">Electoral</a>
                    
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Links</h4>
                    <a class="btn btn-link" href="about.html">Información</a>
                    <a class="btn btn-link" href="contact.html">Contactanos</a>
                    <a class="btn btn-link" href="feature.html">Nuestros servicios</a>
                    <a class="btn btn-link" href="">Terminos & Condiciones</a>
                    <a class="btn btn-link" href="contact.html">Soporte</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">noticias</h4>
                    <p>Enterese de las ultimas actualizaciones</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-light border-light w-100 py-3 ps-4 pe-5" type="text" placeholder="email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">ScholSys</a>, Todos los derechos reservados.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Diseñado por <a class="border-bottom" href="">ScholSys</a> Distributed By <a href="">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JS externo -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/dist/wow.min.js"></script>

    <!-- JS locales con asset() -->
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Script principal -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>