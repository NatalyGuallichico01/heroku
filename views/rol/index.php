<h1 class="nombrePagina">Roles</h1>
<p class="descripcionPagina">Administración de Roles</p>

<div class="barra">
    <p>Hola <?php echo $nombre ?? ''; ?></p>
    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<?php if (isset($_SESSION['admin'])){?>
<div class="barraServicios">
    <a class="boton" href="/admin">Ver Citas</a>
    <a class="boton" href="/clientes">Ver Clientes</a>
    <a class="boton" href="/roles">Ver Roles</a>
    <a class="boton" href="/roles/crear">Nuevo Rol</a>
    
</div>

<?php } ?>

<ul class="servicios">
    <?php foreach($perfil as $rol)  {?>
        <li>
            <p>Rol: <span><?php echo $rol->descripcion;?></span></p>
            <div class="acciones">
                <a class="boton" href="/roles/actualizar?id=<?php echo $rol->id; ?>">Actualizar</a>
                <form action="/roles/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $rol->id; ?>">
                    <input type="submit" value="Eliminar" class="botonDelete">
                </form>
            </div>
        </li>
        <?php }?>
</ul>