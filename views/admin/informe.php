
<?php
include("../includes/database.php");

$consulta = "SELECT citas.id, citas.hora, citas.estado, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
        $consulta .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio, servicios.precio  ";
        $consulta .= " FROM citas  ";
        $consulta .= " LEFT OUTER JOIN usuarios ";
        $consulta .= " ON citas.usuarioId=usuarios.id  ";
        $consulta .= " LEFT OUTER JOIN citasServicios ";
        $consulta .= " ON citasServicios.citaId=citas.id ";
        $consulta .= " LEFT OUTER JOIN servicios ";
        $consulta .= " ON servicios.id=citasServicios.servicioId ";
        $consulta .= " WHERE citas.estado LIKE '%1' ";
        //$citas=AdminCita::SQL($consulta);

        $citasAtendidas=0;
        $citasNoAtendidas=0;
        $totalCitas=0;

        
        $datos[2]="Atendidos";
	   
	   //echo "<h2>consulta:$consulta</h2>";
       $citas = $db->query($consulta);
	   $columnas=mysqli_num_fields($citas);
       
	   $contenido="<main>
        <h1>Reporte de citas Atendidas</h1>
        <table border='1'>
        <thead>
        <tr bgcolor='#CC3D5C' color='#fff'>
        <th>Cliente</th>
        <th>Hora</th>
        <th>Estado</th>
		<th>Telefono</th>
		<th>Servicio</th>
		<th>Precio</th>
        </tr>
        </thead>
        <tbody>";
	   while($datos = $citas->fetch_array(MYSQLI_NUM)){
        if($datos[2]==="1"){
            echo "atendidos";
        }
		     $contenido.="<tr><td>$datos[3]</td>
						   <td>$datos[1]</td>
						   <td>Atendido</td>
						   <td>$datos[5]</td>
						   <td>$datos[6]</td>
						   <td>$datos[7]</td></tr>
                           ";                           

                           
       }
       
        

        $citasAtendidas++;

       
   
	   
	    $contenido.="<p >Total Atendidas: <span>6</span></p></tbody></table></main>";
	
	
	//echo $contenido;
?>
<!DOCTYPE html>
    <html>
    <head>
        <style>
            @page {
                margin: 0cm 0cm;
                font-family: Arial;
            }
    
            body {
                margin: 3cm 2cm 2cm;
            }
    
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
                background-color: #CC3D5C;
                color: white;
                text-align: center;
                line-height: 30px;
            }
    
            footer {
                position: fixed;
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
                background-color: #CC3D5C;
                color: white;
                text-align: center;
                line-height: 35px;
            }
        </style>
    </head>
    <body>
    <header>
        <h1>PELUQUERIA SEBITAS</h1>
    </header>
    

    <?php echo $contenido ?>
    
    <footer>
        <h1>Natilu01</h1>
    </footer>
    </body>
    </html>

