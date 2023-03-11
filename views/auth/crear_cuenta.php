<h1 class="nombrePagina">Crear Cuenta</h1>
<p class="descripcionPagina">Llena el siguiente formulario para obtener tu cuenta </p>


<?php 
include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario"  method="POST" action="/crearCuenta">
    <div class="campo">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" value="<?php echo s($usuario->nombre); ?>"/>
    </div>

    <div class="campo">
        <label for="apellido">Apellido: </label>
        <input type="text" id="apellido" name="apellido" placeholder="Ingresa tu apellido" value="<?php echo s($usuario->apellido); ?>"/>
    </div>

    <div class="campo">
        <label for="telefono">Teléfono: </label>
        <input type="telefono" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" value="<?php echo s($usuario->telefono); ?>"/>
    </div>

    <div class="campo">
        <label for="email">E-mail: </label>
        <input type="email" id="email" name="email" placeholder="Ingresa tu e-mail" value="<?php echo s($usuario->email); ?>"/>
    </div>

    <div class="campo">
        <label for="password">Contraseña: </label>
        <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" />
    </div>

    <input type="submit" value="Crear Cuenta" class="boton"/>

</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/olvidarPassword">¿Olvidaste tu contraseña?</a>
</div>