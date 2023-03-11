<h1 class="nombrePagina">Actualizar</h1>
<p class="descripcionPagina">Actualiza los campos necesarios</p>

<div class="barra">
    <p>Hola <?php echo $nombre ?? ''; ?></p>
    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<?php if (isset($_SESSION['admin'])){?>
<div class="barraServicios">
    <a class="boton" href="/admin">Ver Citas</a>
    <a class="boton" href="/clientes">Ver Clientes</a>
    <a class="boton" href="/clientes/crear">Nuevo Cliente</a>
</div>

<?php } ?>

<?php
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form  method="POST" class="formulario">
    <?php include_once __DIR__ . '/formulario.php'; ?>
    <input type="submit" class="boton" value="Actualizar">
</form>