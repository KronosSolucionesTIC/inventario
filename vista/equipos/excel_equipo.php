<?php
header("Pragma: public");
header("Expires: 0");
$filename = "historico_equipo.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

//Reemplaza URL de la imagen
$cadena = str_replace('<img src="../imagenes/logo_lunel.png" class="img-fluid">', '', $_GET["tabla"]);
//Unimos
echo $cadena;
