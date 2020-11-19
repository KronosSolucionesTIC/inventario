<?php
include dirname(__file__, 2) . '../../modelo/informes.php';
// Halamos las librerias de dompdf
require_once '../../librerias/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
// Inicializamos dompdf
$dompdf = new Dompdf();
//Se une la cadena con los estilos css de bootstrap
//HTML
$cadena = '<!DOCTYPE html>
<head>
	<title>Historico equipo</title>
	<link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.min.css" />
</head>
<body>
<!-- Modal -->';

//HTML
$cadena .= setlocale(LC_ALL, "es_ES");

//HTML
$cadena .= '
<div id="tablaInventario">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" colspan="2" class="text-center">
                    <img src="../../imagenes/logo_lunel.png">
                  </th>
                  <th scope="col" colspan="6" class="text-center">
                    <h4>
                      <strong>
                        Software Inventory<br>
                        Inventario total
                      </strong>
                    </h4>
                  </th>
                  <th scope="col" colspan="2" class="text-center">
                    <strong>
                        Fecha y hora impresion:<br>';

$cadena .= date('Y-m-d H:i:s');

$cadena .= '
                    </strong>
                  </th>
                </tr>
                <tr>
                  <th scope="col" colspan="10" class="text-center"></th>
                </tr>
                <tr>
                  <th scope="col">Proyecto</th>
                  <th scope="col">Territorial</th>
                  <th scope="col">Area</th>
                  <th scope="col">Persona a cargo</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Tipo de equipo</th>
                  <th scope="col">Modelo</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Procesador</th>
                  <th scope="col">Serial</th>
                </tr>
                </thead>
                <tbody id="contenidoInventario">' .
$tipo = $_GET['tipo'];
if ($tipo == 'inventario_total') {
    //Instancia del informes
    $informes = new informes();
    //Lista del menu Nivel 1
    $listaEquipos = $informes->getInventarioTotal($_GET);
    //Se recorre array de nivel 1
    if (isset($listaEquipos)) {
        $contador = 0;
        for ($i = 0; $i < sizeof($listaEquipos); $i++) {
            $cadena .= ' <tr>';
            $cadena .= ' <td>' . $listaEquipos[$i]["nombre_proyecto"] . '</td>';
            $cadena .= ' <td>' . $listaEquipos[$i]["nombre_territorial"] . '</td>';
            $cadena .= ' <td>' . $listaEquipos[$i]["nombre_area"] . '</td>';
            $cadena .= ' <td>' . $listaEquipos[$i]["persona"] . '</td>';
            $cadena .= ' <td>' . $listaEquipos[$i]["nombre_estado_equipo"] . '</td>';
            $cadena .= ' <td>' . $listaEquipos[$i]["nombre_tipo_equipo"] . '</td>';
            $cadena .= ' <td>' . $listaEquipos[$i]["nombre_modelo"] . '</td>';
            $cadena .= ' <td>' . $listaEquipos[$i]["nombre_marca"] . '</td>';
            $cadena .= ' <td>' . $listaEquipos[$i]["nombre_procesador"] . '</td>';
            $cadena .= ' <td>' . $listaEquipos[$i]["serial_equipo"] . '</td>';
            $cadena .= ' </tr>';
            $contador++;
        }
    } else {
        $cadena .= ' <tr>';
        $cadena .= ' <td colspan="10">No existen equipos</td>';
        $cadena .= ' </tr>';
    }
}

$cadena .= '<tr>
            		<td scope="col" colspan="10">
            			<p class="text-left">
            				<small>
            					<b>Total ';

$cadena .= $contador;

$cadena .= ' registros</b>
            			</p>
            			<p class="text-right">
            				<em>Fecha y hora impresion :';
$cadena .= date('Y-m-d H:i:s');

$cadena .= '</em>
            				</small>
            			</p>
            		</td>
            	</tr>
                  </tr>
                </tbody>
              </table>
            </div>
	</body>
</html>';

$dompdf->loadHtml($cadena);
// Colocamos als propiedades de la hoja
$dompdf->setPaper("A4", "landscape");
// Escribimos el html en el PDF
$dompdf->render();
// Ponemos el PDF en el browser
$dompdf->stream("Inventario");
