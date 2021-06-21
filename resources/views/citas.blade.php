@extends('layout')

@section('content')
<!-- Styles -->
<link rel="stylesheet" type="text/css" href="styles/global.css">
<!-- Styles -->
<link rel="stylesheet" type="text/css" href="styles/vistas-style/calendario_style.css">
<link rel="stylesheet" type="text/css" href="styles/vistas-style/registro_styles.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<div class="contenedor-calendario">
    <section class="section-reg">
        <p class="titles ">Agendar Cita</p>
        <div class="style-form">

            <form class="content-form" action="/citas" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div>
                    <label>Nombre Completo</label><br />
                    <input type="text" name="nombre" placeholder="Nombre por Apellidos">
                </div>

                <div>
                    <label>Fecha de la Cita</label><br />
                    <input type="date" name="fecha" value="10-11-2010">
                </div>

                <div>
                    <label>Horario</label><br />
                    <select name="hora">
                        <option value="">Selecciona un horario</option>
                        <option value="10:00">10:00 a.m</option>
                        <option value="11:00">11:00 a.m</option>
                        <option value="12:00">12:00 p.m</option>
                        <option value="13:00">13:00 p.m</option>
                        <option value="14:00">14:00 p.m</option>
                        <option value="15:00">15:00 p.m</option>
                        <option value="16:00">16:00 p.m</option>
                        <option value="17:00">17:00 p.m</option>
                        <option value="18:00">18:00 p.m</option>
                    </select>
                </div>

                <div>
                    <label>Departamento</label><br />
                    <select name="categoria">
                        <option value="">Selecciona el Departamento</option>
                        <option value="Vinculacion">Vinculacion</option>
                        <option value="Idiomas">Idiomas</option>
                        <option value="Titulacion">Titulacion</option>
                        <option value="Directivos">Directivos</option>
                        <option value="Control Escolar">Control Escolar</option>
                        <option value="Asesorias">Asesorias</option>
                    </select>
                </div>
                <div>
                    <label>Asunto</label><br />
                    <textarea name="asunto" rows="4" cols="15"></textarea>
                </div>
                <br>
                <div>
                    <input class="btn-re" type="submit" value="Agendar Cita">
                </div>

            </form>
        </div>
    </section>
</div>


<!-- CALENDARIO JS --
<div class="contenedor-calendario">
    <div class="calendario" id="calendar"></div>
</div>

<div class="w3-container">
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <div class="barra ">
                <span onclick="document.getElementById('id01').style.display='full'" class="w3-button w3-display-topright">&times;</span>
                <h2>Agendar citas</h2>
            </div>
            <div class="w3-container">
                <form action="/citas" method="POST">
                    {{csrf_field()}}
                    <input type="text">
                    <input type="text" name="nombre" placeholder="Nombre"><br><br>
                    <input type="text" name="fecha" placeholder="Apellido Paterno"><br><br>
                    <input type="text" name="amaterno" placeholder="Apellido Materno"><br><br>
                    <input type="submit" value="Registrarse">
                </form>
            </div>
        </div>
    </div>
</div>
-- FIN CALENDARIO JS -->

<!-- Java Script-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/es.js"></script>
<script type="text/javascript" src="/js/calendario.js"></script>
<script type="text/javascript">
    let calendar = new Calendar('calendar');
    calendar.getElement().addEventListener('change', e => {
        document.getElementById('id01').style.display = 'block';
        console.log(calendar.value().format('LLL'));
    });
</script>


@endsection