<h1 class="nombrePagina">Servicios</h1>
<p class="descripcionPagina">Administración de Servicios</p>
<?php
include_once __DIR__ . '/../templates/barra.php';
?>

<ul class="servicios">
    <?php foreach($servicios as $servicio) {?>
        <li>
            <p>Nombre: <span><?php echo $servicio -> nombre; ?></span></p>
            <p>Precio: <span>$<?php echo $servicio -> precio; ?></span></p>
            <p>Descripción: <span><?php echo $servicio -> descripcion; ?></span></p>
            <div class="acciones">
                <a class="boton" href="/servicios/actualizar?id=<?php echo $servicio->id; ?>">Actualizar</a>
                <form action="/servicios/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $servicio->id; ?>"/>
                    <input type="submit" value="Eliminar" class="botonDelete">
                </form> 
            </div>
        </li>
    <?php } ?>
</ul>

<?php
echo $paginacion;
?>
