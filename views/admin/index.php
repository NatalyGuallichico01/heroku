<h1 class="nombrePagina">Panel de Administrador</h1>
<?php
include_once __DIR__ . '/../templates/barra.php';
?>
<!-- <button class="boton" id="btnCrearPdf">Crear Pdf</button> -->

<h2>Buscar Citas</h2>

<div class="barraServicios1">
    <a class="botonReporte" href="/admin/filtro">Reporte de Citas</a>
     <a class="botonReporte" href="/admin/filtrar">Reporte del dia</a>
</div>
     

     <!-- Los cambios que se encontraban en el archivo filtro estan en generate y viceversa
    modificar en caso de backup -->
    


<!-- <input type="submit" name="estado" id="estado" class="botonReporte" value="Reporte" />  -->
<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha Inicio: </label>
            <input type="date" id="fecha" name="fecha" value="<?php echo $fecha ?>"/>
        </div>
        <!-- <div class="campo">
            <label for="fecha">Fecha Fin: </label>
            <input type="date" id="fechaFinal" name="fechaFinal" value="<?php echo $fechaFinal ?>"/>
        </div>
        <div>
        <button  id="estado">Buscar</button>
        </div> -->
       
    </form>
</div>

<?php
    if(count($citas)===0){
        echo "<h2>No hay Citas en esta Fecha</h2>";
    }
?>

<div id="citasAdmin">

    <ul class="citas">
        
        <?php
        $idCita = 0;
        
        foreach ($citas as $key => $cita) {
           //debuguear($key);
            if ($idCita !== $cita->id) {
                $total=0;
        ?>
        
                <li>
                <h3>Información Cliente</h3>
                    <p>Id: <span><?php echo $cita->id; ?></span></p>
                    <p>Hora: <span><?php echo $cita->hora; ?></span></p>
                    <p>Cliente: <span><?php echo $cita->cliente; ?></span></p>
                    <p>E-mail: <span><?php echo $cita->email; ?></span></p>
                    <p>Teléfono: <span><?php echo $cita->telefono; ?></span></p>
                    <!-- <p>Estado: <span><?php //echo $cita->estado; ?></span></p> -->
                    <hr>

                    <h3>Servicios</h3>
                <?php
                $idCita = $cita->id;
                 
            } //Fin de if 
                $total+= $cita->precio;
                ?>
                <p class="servicio"><?php echo $cita->servicio . " " . $cita->precio; ?></p>
                <?php 
                $actual=$cita->id;
                //debuguear($cita);
                //$cita->estado="1";
                $proximo=$citas[$key+1]->id ?? 0;

                if (isLast($actual, $proximo)) {

                    ?> 
                    <p class="total">Total: <span>$ <?php echo $total ?></span></p>
                    <form action="/api/delete" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cita->id; ?>"/>
                        <?php 
                        if($cita->estado==="0"){
                            ?>
                        <input type="submit" name="estado" id="estado" class="botonDelete" value="Atendido" />
                        <?php
                        }
                         ?>
                        
                    </form>
                    <?php
                }
                ?>
            <?php } // fin foreach 
            ?>

    </ul>

</div>

<div>
    <h1>Total citas</h1>


    <ul class="totalCitas">
        
        <?php
        $citasAtendidas=0;
        $citasNoAtendidas=0;
        $totalCitas=0;
        
        foreach ($citas as $cita) {
           //debuguear($key);
            if ($cita->estado==="1") {
                $citasAtendidas++;
        ?>
        
                
                
                <?php
                
                 
            } //Fin de if 
            else if($cita->estado==="0") {
                $citasNoAtendidas++;
        ?>
        
               
                
                <?php
                
                 
            } //Fin de if 
           
             } // fin foreach 
             $totalCitas=$citasAtendidas+$citasNoAtendidas;
            ?>
            
            <p >Total Atendidas: <span><?php echo  $citasAtendidas?></span></p>
            <p >Total No Atendidas: <span><?php echo $citasNoAtendidas?></span></p>
            <p >Total: <span> <?php echo $totalCitas?></span></p>

    </ul>

</div>





<!-- <?php
//require('../fpdf/fpdf.php');

//$pdf = new FPDF();
//$pdf->AddPage();
//$pdf->SetFont('Arial','B',16);
//$pdf->Cell(40,10,'¡Hola, Mundo!');
//$pdf->Output();
?> -->


<?php 
    
    $script="<script src='build/js/buscador.js'></script>";
   // $script="<script src='build/js/script.js'></script>";
   
?>
