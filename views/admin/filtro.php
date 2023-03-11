
<!-- <?php
// require_once 'dompdf/autoload.inc.php';

// use Dompdf\Dompdf;

// $dompdf = new Dompdf();
// $html = file_get_contents('prueba.html');
// $dompdf->loadHtml($html);
// $dompdf->setPaper('A4', 'portrait');
// $dompdf->render();

// // header('Content-Type: application/pdf');
// // header('Content-Disposition: attachment; filename="portrait.pdf"');
// // echo $dompdf->output();
// $dompdf->stream("my_pdf.pdf", array("Attachment" => 0));
// exit;
?> -->


<?php
require_once '../public/libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();
include "fechas.php";

$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();
exit;
?>