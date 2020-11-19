<?php
include dirname(__file__, 2) . '/modelo/informes.php';

$informes = new informes();
$tipo     = $_GET['tipo'];

if ($tipo == 'inventario_total') {
    $resultado = $informes->getInventarioTotal($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}
