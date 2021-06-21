<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="styles/vistas-style/registro_styles.css">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="styles/global.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/img/logfav.png') }}">


    <!-- Title pestaña navegador. -->
    <title>Registro</title>

    <!-- style icon font awesome -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <!-- Loader -->
    <div id="contenedor_carga">
        <div id="carga"></div>
    </div>
    <section class="section-reg">
        <p class="titles ">Bienvenido</p>
        <div class="style-form">


            <form class="content-form" action="/registro" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div>
                    <label>Nombre</label><br />
                    <input type="hidden" id="random" name="matricula" readonly value="<?php
                                                                                        $tesoem = 'T';
                                                                                        $caracteres = '0123456789';
                                                                                        $aleatoria = substr(str_shuffle($caracteres), 0, 8);
                                                                                        echo $tesoem . $aleatoria . "\n"; ?>">


                    <input type="text" name="nombre" placeholder="Nombre">
                </div>
                <div>
                    <label>Apellido Paterno</label><br />
                    <input type="text" name="a_pat" placeholder="Apellido Paterno">

                </div>

                <div>
                    <label>Apellido Materno</label><br />
                    <input type="text" name="a_mat" placeholder="Apellido Materno">
                </div>
                <div>
                    <label>Fecha de Nacimiento</label><br />
                    <input type="date" name="fecha_nacimiento" placeholder="Nombre de la Calle">
                </div>
                <div>
                    <label>Dirección</label><br />
                    <input type="text" name="direccion" placeholder="Direccion">
                </div>
                <div>
                    <label>Código postal</label><br />
                    <input type="number" name="cod_postal" placeholder="Codigo Postal">
                </div>
                <div>
                    <label>Localidad</label><br />
                    <input type="text" name="localidad" placeholder="Localidad">
                </div>

                <div>
                    <label>Teléfono</label><br />
                    <input type="text" name="telefono" placeholder="Telefono">
                </div>
                <div>
                    <label>Email</label><br />
                    <input type="email" name="email" placeholder="Correo Electronico">
                </div>
                <div>
                    <label>Contraseña</label><br />
                    <input type="password" name="password" placeholder="Contraseña">
                </div>


                <div>
                    <label>Tipo</label>
                    <br />
                    <select name="id_tipo">
                        @foreach($typeusers as $typeuser)
                        <option value="{{$typeuser->id_tipo}}">
                            {{$typeuser->tipo}}
                        </option>
                        @endforeach
                    </select>

                </div>

                <div>
                    <label>Carrera</label><br />
                    <select name="carrera">
                        <option selected>Selecciona tu carrera</option>
                        <option value="1">Contabilidad</option>
                        <option value="2">Licenciatura en gastronomia</option>
                        <option value="3">Ingenieria ambiental</option>
                        <option value="4">Ingenieria industrial</option>
                        <option value="5">Ingeniera en administracion</option>
                        <option value="6">Ingeniera en energias renovables</option>
                        <option value="7">Ingeniera en sistemas computacionales</option>
                        <option value="8">Ingenieria en tecnologias de la informacion</option>
                    </select>
                </div>

                <div>
                    <label>Semestre</label><br />
                    <select name="semestre">
                        <option selected>Selecciona tu semestre</option>
                        <option value="1">Primer Semestre</option>
                        <option value="2">Segundo Semestre</option>
                        <option value="3">Tercer Semestre</option>
                        <option value="4">Cuarto Semestre</option>
                        <option value="5">Quinto Semestre</option>
                        <option value="6">Sexto Semestre</option>
                        <option value="7">Septimo Semestre</option>
                        <option value="8">octavo Semestre</option>
                        <option value="9">noveno Semestre</option>
                        <option value="10">Decimo Semestre</option>
                        <option value="11">Decimo Primer Semestre</option>
                        <option value="12">Decimo Segundo Semestre</option>
                        <option value="13">Decimo Tercer Semestre</option>
                        <option value="14">Decimo Cuarto Semestre</option>
                        <option value="15">Decimo Quinto Semestre</option>
                        <option value="16">Decimo Sexto Semestre</option>
                        <option value="17">Decimo Septimo Semestre</option>
                        <option value="18">Decimo Octavo Semestre</option>
                    </select>
                </div>

                <div>
                    <label>Foto</label><br />
                    <input type="file" name="foto" required><br><br>

                </div>
                <div>


                    <input class="btn-re" type="submit" value="Registrar">

                </div>

            </form>
        </div>
    </section>

    <script>
        window.onload = function() {
            var contenedor = document.getElementById("contenedor_carga");
            console.log("hola");
            contenedor.style.visibility = "hidden";
            contenedor.style.opacity = "0";
        }
    </script>

</body>

</html>