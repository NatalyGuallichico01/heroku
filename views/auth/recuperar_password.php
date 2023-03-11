<h1 class="nombrePagina">Recuperar Contraseña</h1>
<p class="descripcionPagina">A continuación ingresa tu Nueva Contraseña</p>

<?php 
include_once __DIR__ . "/../templates/alertas.php";
?>

<?php if($error) return; ?>

<form class="formulario" method="POST">
    <div class="campo">
        <label for="password">Contraseña: </label>
        <input type=password" id="password" name="password" placeholder="Ingresa tu Nueva Contraseña" />
    </div>
    <input type="submit" class="boton" value="Guardar">

</form>

<div class="acciones">
    <a href="/">¿Ya tienes Cuenta? Iniciar Sesión</a>
    <a href="/crearCuenta">¿Aún no tienes Cuenta? Crear Cuenta</a>
</div>