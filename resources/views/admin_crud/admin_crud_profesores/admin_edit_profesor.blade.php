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
                        <li><a href="index-2.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="active-bre"><a href="#"> Editar Profesor</a>
                        </li>
                    </ul>
                </div>

                <!--== User Details ==-->
                <div class="sb2-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-inn-sp admin-form">
                                <div class="inn-title">
                                    <h4>Editar Profesor</h4>
                                    <p>Here you can edit your website basic details URL, Phone, Email, Address, User and
                                        password and more</p>
                                </div>
                                <div class="tab-inn">
                                    <form>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input type="text" value="Latinoo College Expo 2018 - DONATION"
                                                    class="validate" required>
                                                <label class="">Seminar name</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea>Fusce purus mauris, blandit vitae purus eget, viverra volutpat nibh. Nam in elementum nisi, a placerat nisi. Quisque ullamcorper magna in odio rhoncus semper.Sed nec ultricies velit. Aliquam non massa id enim ultrices aliquet a ac tortor.

Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</textarea>
                                                <label class="">Seminar Descriptions</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" value="Jan 01, 2018" class="validate" required>
                                                <label class="">Date</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" class="validate" value="02:00 PM GMT" required>
                                                <label class="">Time</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s6">
                                                <input type="text" value="New york" class="validate">
                                                <label class="">City</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <input type="text" value="United states" class="validate">
                                                <label class="">Country</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="file-field input-field col s12">
                                                <div class="btn admin-upload-btn">
                                                    <span>Carga de foto</span>
                                                    <input type="file">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text"
                                                        placeholder="Foto del Profesor">
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