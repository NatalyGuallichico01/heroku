<h1 class="nombrePagina">Olvide mi Contraseña</h1>
<p class="descripcionPagina">Reestablece tu contraseña ingresado tu e-mail a continuación</p>

<?php 
include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" action="/olvidarPassword" method="POST">
    <div class="campo">
        <label for="email">E-mail: </label>
        <input type="email" id="email" name="email" placeholder="Ingresa tu E-mail" />
    </div>

    <input type="submit" class="boton" value="Envíar">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/crearCuenta">¿Aún no tienes una Cuenta? Crear Cuenta</a>
</div>