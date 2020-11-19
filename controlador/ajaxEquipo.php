<?php
include dirname(__file__, 2) . '/modelo/equipo.php';

$equipo = new Equipo();
$tipo   = $_GET['tipo'];

if ($tipo == 'inserta') {
    if ($equipo->insertaEquipo($_GET)) {
        if ($equipo->insertaInventario($_GET)) {
            if ($equipo->insertaHistorico($_GET)) {
                return 'Se guardo';
            }
        }
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'consulta') {
    $resultado = $equipo->consultaEquipo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    if ($equipo->editaEquipo($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'elimina_logico') {
    if ($equipo->eliminaLogicoEquipo($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'valida_serial') {
    $resultado = $equipo->validaSerial($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'valida_tipo_equipo') {
    $resultado = $equipo->validaTipoEquipo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_tipo_equipo') {
    if ($equipo->insertaTipoEquipo($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultimo_tipo_equipo') {
    $resultado = $equipo->ultimoTipoEquipo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'valida_modelo') {
    $resultado = $equipo->validaModelo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_modelo') {
    if ($equipo->insertaModelo($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultimo_modelo') {
    $resultado = $equipo->ultimoModelo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'valida_marca') {
    $resultado = $equipo->validaMarca($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_marca') {
    if ($equipo->insertaMarca($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultima_marca') {
    $resultado = $equipo->ultimaMarca($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'valida_procesador') {
    $resultado = $equipo->validaProcesador($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_procesador') {
    if ($equipo->insertaProcesador($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultimo_procesador') {
    $resultado = $equipo->ultimoProcesador($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'consulta_modelo') {
    $resultado = $equipo->consultaModelo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'valida_ram') {
    $resultado = $equipo->validaRam($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_ram') {
    if ($equipo->insertaRam($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultima_ram') {
    $resultado = $equipo->ultimaRam($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'valida_sistema_operativo') {
    $resultado = $equipo->validaSistemaOperativo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_sistema_operativo') {
    if ($equipo->insertaSistemaOperativo($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultima_sistema_operativo') {
    $resultado = $equipo->ultimaSistemaOperativo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}
