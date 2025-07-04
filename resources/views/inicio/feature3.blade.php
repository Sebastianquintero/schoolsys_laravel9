<!DOCTYPE html>
<html lang="en">

<head>
    @include('inicio.partials.head')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    @include('inicio.partials.topbarstart')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('inicio.partials.navbar')
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
    @include('inicio.partials.footer')
    <!-- Footer End --> 
</body>

</html>