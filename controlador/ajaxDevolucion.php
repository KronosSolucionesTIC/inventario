<?php
include dirname(__file__, 2) . '/modelo/devolucion.php';

$devolucion = new devolucion();
$tipo       = $_POST['tipo'];

if ($tipo == 'lista_equipos') {
    $resultado = $devolucion->listaEquipos($_POST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta') {
    if ($devolucion->insertaDevolucion($_POST)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'lista_territoriales') {
    $resultado = $devolucion->listaTerritoriales($_POST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'lista_funcionarios') {
    $resultado = $devolucion->listaFuncionarios($_POST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'lista_equipos_funcionario') {
    $resultado = $devolucion->listaEquiposFuncionario($_POST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_devolucion_funcionario') {
    if ($devolucion->insertaDevolucionFuncionario($_POST)) {
        if ($devolucion->insertaDetalleDevolucionFuncionario($_POST)) {
            if ($devolucion->insertaHistorico($_POST)) {
                if ($devolucion->modificaInventario($_POST)) {
                    return 'Se guardo';
                } else {
                    return 'No se guardo';
                }
            }
        }
    }
}

if ($tipo == 'devolucion_funcionario') {
    $resultado = $devolucion->devolucionFuncionario($_POST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'detalle_devolucion_funcionario') {
    $resultado = $devolucion->detalleDevolucionFuncionario($_POST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}
