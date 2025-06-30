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
                        <li><img src="{{ asset('images/placeholder.jpg') }}" alt="">
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
                        <li><a href="admin.html"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
                        </li>
                        <li class="active-bre"><a href="#"> Editar Actividades</a>


                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Editar actividades</h4>
                                    <p>Editar actividades</p>
                                </div>
                                <div class="tab-inn">
                                    <form>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" value="Actividad" class="validate" required>
                                                <label class="">Nombre de la actividad</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea>Fusce purus mauris, blandit vitae purus eget, viverra volutpat nibh. Nam in elementum nisi, a placerat nisi. Quisque ullamcorper magna in odio rhoncus semper.Sed nec ultricies velit. Aliquam non massa id enim ultrices aliquet a ac tortor.</textarea>
                                                <label class="">Descripcion</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="number" value="12" class="validate" required>
                                                <label class="">numero</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" value="Junio 01, 2025" class="validate" required>
                                                <label class="">Fecha inicio</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" class="validate" value="02:00 PM GMT -5" required>
                                                <label class="">Tiempo</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" value="Bogotá D.C." class="validate">
                                                <label class="">Ciudad</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" value="Colombia" class="validate">
                                                <label class="">Pais</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="file-field input-field col s12">
                                                <div class="btn admin-upload-btn">
                                                    <span>Archivo</span>
                                                    <input type="file">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text"
                                                        placeholder="Subir archivo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="waves-effect waves-light btn-large waves-input-wrapper"><input
                                                        type="submit" class="waves-button-input"></i>
                                            </div>
                                        </div>
                                    </form>
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