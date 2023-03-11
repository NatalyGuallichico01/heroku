<h1 class="nombrePagina">Crear Nueva Cita</h1>
<p class="horariosPagina">Horarios de Atención</p>
<p class="descripcionPagina ">Lunes a Viernes de 9:00-18:00</p>
<br/>
<p class="descripcionPagina">Elige el/los servicios que deseas e ingresa tus datos</p>

<!-- <?php
//include_once __DIR__ . '/../templates/barra.php';
?> -->

<div class="barra">
    <p>Hola <?php echo $nombre ?? ''; ?></p>
    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<div id="app">
    <nav class="tabs">
        <button class="actual" type="button" data-paso="1">Servicios</button>
        <button type="button" data-paso="2">Información Cita</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>

    <div id="paso1" class="seccion">
        <h2>Servicios</h2>
        <p class="textCenter">Elige el/los servicios que deseas</p>
        <div id="servicios" class="listadoServicios"></div>
    </div>

    <div id="paso2" class="seccion">
        <h2>Tus Datos y Cita</h2>
        <p class="textCenter">Ingresa tus datos y fecha de tu cita</p>

        <form class="formulario" >

        <div class="campo">
                <h4>Las horas resaltadas con color ROJO ya han sido seleccionadas.</h4>
            </div>
            
            <div class="campo">
                <label for="nombre">Nombre: </label>
                <input id="nombre" type="text" placeholder="Ingresa tu Nombre" value="<?php echo $nombre; ?>" disabled/>
            </div>
            <div class="campo">
                <label for="fecha">Fecha: </label>
                <input id="fecha" type="date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"/>
            </div>

           

            <div class="campo">
                <label for="hora">Hora: </label>
                <input id="hora"/>
            </div>

            <input type="hidden" id="id" value="<?php echo $id; ?>"/>
        </form>

    </div>

    <div id="paso3" class="seccion contenido-resumen">
        
        
    </div>

    <div class="paginacion1">
        <button id="anterior" class="boton">&laquo; Anterior</button>
        <button id="siguiente" class="boton">Siguiente &raquo;</button>
    </div>

</div>

<?php
    $script="
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='build/js/app.js'></script>
        <script src='build/js/citas.js'></script>
    ";
?>