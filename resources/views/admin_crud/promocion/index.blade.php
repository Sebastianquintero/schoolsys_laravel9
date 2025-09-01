<!DOCTYPE html>
<html lang="en">


<head>
    @include('admin_crud.partials.head')
</head>

<body>
    <!--== MAIN CONTRAINER ==-->
    @include('admin_crud.partials.main_container')

    <!--== BODY CONTNAINER ==-->
    <div class="container-fluid sb2">
        <div class="row">
            <div class="sb2-1">
                <!--== USER INFO ==-->
                <div class="sb2-12">
                    <ul>
                        <li><img src="{{ auth()->user()->foto_url }}" class="img-thumbnail rounded-circle" width="120"
                                alt="Foto">
                        </li>
                        @php
                            $rol = Auth::user()->fk_rol;
                        @endphp
                        <li>
                            <h5>{{ Auth::user()->nombres }}<span> Bogotá D.C.</span></h5>
                        </li>
                        <li></li>
                    </ul>
                </div>
                <!--== LEFT MENU ==-->
                @include('admin_crud.partials.menu')
            </div>

            <!--== BODY INNER CONTAINER ==-->
            <div class="sb2-2">
                <!--== breadcrumbs ==-->
                <div class="sb2-2-2">
                    <ul>
                        <li><a href="index-2.html"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a>
                        </li>
                        <li class="active-bre"><a href="#">promoción</a>
                        </li>
                        <li class="page-back"><a href="{{ route('admin') }}"><i class="fa fa-backward"
                                    aria-hidden="true"></i>Atras</a>
                        </li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp">
                                <div class="inn-title">
                                    <h4>Detalles de estudiantes</h4>
                                    <p>Detalles de todos los estudiantes de la institución</p>
                                </div>
                                <div class="tab-inn">
                                    <div class="table-responsive table-desi">
                                        <table class="table table-hover">
                                            <form method="GET" action="{{ route('admin.promover.cargar') }}"
                                                style="display:flex;gap:1rem;align-items:center;flex-wrap:wrap">
                                                <div>
                                                    <label class="active"
                                                        style="display:block;margin-bottom:.25rem">Curso</label>
                                                    <select name="curso" required class="browser-default"
                                                        style="min-width:220px">
                                                        @foreach($cursos as $c)
                                                            <option value="{{ $c->id_curso }}">
                                                                {{ $c->numero_curso }} - {{ $c->nombre_curso }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div>
                                                    <label class="active" style="display:block;margin-bottom:.25rem">Año
                                                        escolar</label>
                                                    <input type="text" name="anio" value="{{ $anio }}" required
                                                        class="browser-default" style="min-width:140px">
                                                </div>

                                                <div>
                                                    <button class="btn green" style="margin-top:1.35rem">Cargar</button>
                                                </div>
                                            </form>


                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('admin_crud.partials.footer')
</body>

</html>