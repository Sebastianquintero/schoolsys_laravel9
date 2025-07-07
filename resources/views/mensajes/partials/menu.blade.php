 <div class="container-fluid sb1">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu"></i></a>
                <a href="{{ route('dashboard_estudiante') }}" class="a">
                    <h1 class="m0">ScholSys</h1>
                </a>
            </div>
            <div class="col-md-6 col-sm-6 mob-hide">
                <form class="app-search">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href="#"><i class="fa fa-search"></i></a>
                </form>
            </div>
            <div class="col-md-2 tab-hide">
                <div class="top-not-cen">
                    <a class='waves-effect btn-noti' href="{{ route('dashboard_estudiante') }}" title="dashboard"><i
                            class="fa fa-commenting-o"></i><span>1</span></a>
                    <a class='waves-effect btn-noti' href="{{ route('mensajes.bandeja') }}" title="correo"><i
                            class="fa fa-envelope-o"></i><span>1</span></a>
                    <a class='waves-effect btn-noti' href="#" title="etiquetas"><i class="fa fa-tag"></i></a>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-6">
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'>
                    <img src="{{ asset('images/placeholder.jpg') }}" alt="" />Mi cuenta <i class="fa fa-angle-down"></i>
                </a>
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="{{ route('perfil') }}" class="waves-effect"><i class="fa fa-cogs"></i> Configuración de
                            perfil</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}" class="ho-dr-con-last waves-effect"><i
                                class="fa fa-sign-in"></i> Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </div>