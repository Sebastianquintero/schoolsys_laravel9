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
            <h1 class="display-3 text-white mb-4 animated slideInDown">Informacion</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.html">inicio</a></li>
                    <li class="breadcrumb-item"><a href="feature.html">soluciones educativas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">informacion</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-4 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="img/equipo.jpg">
                </div>
                <div class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-1 text-primary mb-0">Acerca de nosotros</h1>
                    <p class="text-primary mb-4">Experiencia, desarrollo y compromiso</p>
                    <p class="mb-4">En el mundo digital actual, la creación de aplicaciones web efectivas es crucial
                        para el éxito de cualquier negocio. En este contexto, un equipo de desarrollo de software
                        comprometido se convierte en el corazón de cualquier proyecto.
                        <br><br>
                        Este equipo se caracteriza por su dedicación y pasión por la tecnología. Cada miembro aporta
                        habilidades únicas, desde desarrolladores que dominan diversos lenguajes de programación hasta
                        diseñadores que crean interfaces intuitivas y atractivas. Juntos, trabajan en un ambiente
                        colaborativo, donde la comunicación fluida es fundamental.
                        <br><br>
                        La planificación es uno de los pilares del trabajo en equipo. Comienzan con una reunión inicial
                        para comprender las necesidades del cliente y definir los objetivos del proyecto. A lo largo del
                        desarrollo, utilizan metodologías ágiles que permiten adaptarse a los cambios y mejorar
                        continuamente el producto. Esto asegura que la aplicación no solo cumpla con las expectativas,
                        sino que también se ajuste a las tendencias del mercado.
                    </p>
                    <a class="btn btn-primary py-3 px-4" href="">Leer más</a>
                </div>

            </div>
        </div>
    </div>
    <!-- About End -->


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



    <!-- Footer Start -->
    @include('inicio.partials.footer')
    <!-- Footer End -->
</body>

</html>