<h1 class="nombrePagina">Clientes</h1>
<p class="descripcionPagina">Administración de Clientes</p>

<div class="barra">
    <p>Hola <?php echo $nombre ?? ''; ?></p>
    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<?php if (isset($_SESSION['admin'])){?>
<div class="barraServicios">
    <a class="boton" href="/admin">Ver Citas</a>
    <!-- <a class="boton" href="/rol/crear">Nuevo Rol</a> -->
    <a class="boton" href="/clientes/crear">Nuevo Cliente</a>
</div>

<?php } ?>


<!-- SEGUNDO INTENTO -->

<!--DESCOMENTAR EN CASO DE BUSQUEDA DE CLIENTES POR NOMBRE -->

<!-- <h2>Buscar Clientes</h2>
<fieldset class="formulario__fieldset">
    <div class="campo">
        <label for="usuarios" class="formulario__label">Nombre: </label>
        <input type="text" class="formulario__input" id="usuarios" placeholder="Buscar Nombre"/>
        <ul id="listadoCLientes" class="listadoClientes"></ul>
    </div>
    
</fieldset> -->










<!-- 
<div id=clientesAdmin>
    <ul class="citas">
    <?php
    
    //foreach($usuarios as $usuario){
    ?>
    <li>
       // <p>ID: <span><?php// echo $usuario->id; ?></span></p>
        <p>Nombre: <span><?php //echo $usuario->nombre; ?></span></p>
        <p>Apellido: <span><?php //echo $usuario->apellido; ?></span></p>
        <p>Teléfono: <span><?php// echo $usuario->telefono; ?></span></p>
        <p>E-mail: <span><?php// echo $usuario->email; ?></span></p>
    </li>
 //   <?php //}?>
    </ul>
</div> -->









<!-- <h1>Buscar Clientes</h1>
<form action="" method="GET">
    <input type="text" name="busqueda"><br>
    <input type="submit" name="enviar" value="Buscar">
</form>
<br><br><br>

<?php

//include '../includes/database.php';

//if(isset($_GET['enviar'])){
 //   $busqueda=$_GET['busqueda'];
 //   $consulta=$db->query("SELECT * FROM usuarios nombre LIKE %busqueda%");
 //   debuguear($consulta);
 //   while($row=$consulta->fetch_array()){
 //       echo $row['nombre'];
       
 //   }
//}
 ?> -->










<h2>Clientes</h2>

<ul class="servicios">
    <?php foreach($usuarios as $usuario) {?>
        <li>
            <p>Nombre: <span><?php echo $usuario -> nombre; ?></span></p>
            <p>Apellido: <span><?php echo $usuario -> apellido; ?></span></p>
            <p>Teléfono: <span><?php echo $usuario -> telefono; ?></span></p>
            <p>E-mail: <span><?php echo $usuario -> email; ?></span></p>
            
            <div class="acciones">
                <a class="boton" href="/clientes/actualizar?id=<?php echo $usuario->id; ?>">Actualizar</a>
                <form action="/clientes/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $usuario->id; ?>"/>
                    <!--<input type="submit" value="Eliminar" class="botonDelete">-->
                </form>
            </div>
        </li>
    <?php } ?>
</ul>

<?php
echo $paginacion;
?>

<?php 
    $script="<script src='build/js/clientes.js'></script>";
?>