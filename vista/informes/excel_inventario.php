<?php
header("Pragma: public");
header("Expires: 0");
$filename = "inventario.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

include dirname(__file__, 2) . '../../modelo/informes.php';
?>
		<div id="tablaInventario">
            <table class="table table-bordered" >
              <thead>
                <tr>
                  <th scope="col" colspan="2" class="text-center">
                    <img src="../imagenes/logo_lunel.png" class="img-fluid">
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
                        Fecha y hora impresion:<br>
                        <?php echo date('Y-m-d H:i:s'); ?>
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
                <tbody id="contenidoInventario">
                	<?php
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
            echo '<tr>';
            echo '<td>' . $listaEquipos[$i]["nombre_proyecto"] . '</td>';
            echo '<td>' . $listaEquipos[$i]["nombre_territorial"] . '</td>';
            echo '<td>' . $listaEquipos[$i]["nombre_area"] . '</td>';
            echo '<td>' . $listaEquipos[$i]["persona"] . '</td>';
            echo '<td>' . $listaEquipos[$i]["nombre_estado_equipo"] . '</td>';
            echo '<td>' . $listaEquipos[$i]["nombre_tipo_equipo"] . '</td>';
            echo '<td>' . $listaEquipos[$i]["nombre_modelo"] . '</td>';
            echo '<td>' . $listaEquipos[$i]["nombre_marca"] . '</td>';
            echo '<td>' . $listaEquipos[$i]["nombre_procesador"] . '</td>';
            echo '<td>' . $listaEquipos[$i]["serial_equipo"] . '</td>';
            echo '</tr>';
            $contador++;
        }
    } else {
        echo '<tr>';
        echo '<td colspan="10">No existen equipos</td>';
        echo '</tr>';
    }
}
?>
                <tr>
            		<td scope="col" colspan="10">
            			<p class="text-left">
            				<small>
            					<b>Total <?php echo $contador; ?> registros</b>
            			</p>
            			<p class="text-right">
            				<em>Fecha y hora impresion :<?php echo date('Y-m-d H:i:s'); ?></em>
            				</small>
            			</p>
            		</td>
            	</tr>
                </tbody>
              </table>
            </div>