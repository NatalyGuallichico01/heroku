
<?php
//require __DIR__ . 'dompdf/autoload.inc.php';
require_once '../public/libreria/dompdf/autoload.inc.php';

//$mysql=new mysqli('localhost', 'root', 'admin', 'appsebitas');
use Model\AdminCita;
use Dompdf\Dompdf;
use Dompdf\Option;
use Dompdf\Exception as DompdfException;
use Dompdf\Optins;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
ob_start();
include "informe.php";
include "noAtendidos.php";
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();
//$dompdf->loadHtml('hello world');


// (Optional) Setup the paper size and orientation
//$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
//$dompdf->render();
//$fecha = date('H:i:s');

// Output the generated PDF to Browser
//$dompdf->stream("archivo.pdf", array("Attachment" => 0))();


// use Dompdf\Dompdf;

// $dompdf = new Dompdf();
// $html = loadHtml('hello world from pdf');
// $dompdf->loadHtml($html);
// $dompdf->setPaper('A4', 'portrait');
// $dompdf->render();

// header('Content-Type: application/pdf');
// header('Content-Disposition: attachment; filename="portrait.pdf"');
// echo $dompdf->output();
//$dompdf->stream("my_pdf.pdf", array("Attachment" => 0));
exit;
?> 



<!-- 
    require_once '../../public/libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();
include "informe.php";
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();

-->