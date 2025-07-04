<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="{{route('index')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
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