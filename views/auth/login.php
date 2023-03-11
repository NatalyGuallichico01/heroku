<h1 class="nombrePagina">Login</h1>
<p class="descripcionPagina">Iniciar  Sesión</p>

<?php 
include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" method="POST" action="/">
    <div class="campo">
        <label for="email">Email: </label>
        <input type="email" id="email" placeholder="Ingresa tu email" name="email" />
    </div>

    <div class="campo">
        <label for="password">Contraseña: </label>
        <input type="password" id="password" placeholder="Ingresa tu contraseña" name="password"/>
    </div>

    <input type="submit" class="boton" value="Iniciar Sesión">

</form>

<div class="acciones">
    <a href="/crearCuenta">¿Aún no tienes una cuenta? Crear cuenta</a>
    <a href="/olvidarPassword">¿Olvidaste tu contraseña?</a>
</div>

