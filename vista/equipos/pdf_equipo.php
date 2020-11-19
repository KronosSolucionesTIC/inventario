<?php
// Jalamos las librerias de dompdf
require_once '../../librerias/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
// Inicializamos dompdf
$dompdf = new Dompdf();
//Se une la cadena con los estilos css de bootstrap
$inicio = '<!DOCTYPE html>
<html>
<head>
	<title>Historico equipo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<!-- Modal -->
<?php
setlocale(LC_ALL, "es_ES");
?>';
//Reemplaza URL de la imagen
$cadena = str_replace('<img src="../imagenes/logo_lunel.png" class="img-fluid">', '<img src="../../imagenes/logo_lunel.png" >', $_GET["tabla"]);
//Unimos
$cadena = $inicio . $cadena;
$dompdf->loadHtml($cadena);
// Colocamos als propiedades de la hoja
$dompdf->setPaper("A4", "landscape");
// Escribimos el html en el PDF
$dompdf->render();
// Ponemos el PDF en el browser
$dompdf->stream("Historico_equipo");
