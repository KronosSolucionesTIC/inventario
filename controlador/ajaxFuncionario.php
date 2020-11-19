<?php
include dirname(__file__, 2) . '/modelo/funcionario.php';

$funcionario = new Funcionario();
$tipo        = $_GET['tipo'];

if ($tipo == 'inserta') {
    if ($funcionario->insertaFuncionario($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'consulta') {
    $resultado = $funcionario->consultaFuncionario($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    if ($funcionario->editaFuncionario($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'elimina_logico') {
    if ($funcionario->eliminaLogicoFuncionario($_GET)) {
        return 'Se guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'valida_territorial') {
    $resultado = $funcionario->validaTerritorial($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_territorial') {
    if ($funcionario->insertaTerritorial($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultima_territorial') {
    $resultado = $funcionario->ultimaTerritorial($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'valida_area') {
    $resultado = $funcionario->validaArea($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_area') {
    if ($funcionario->insertaArea($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultima_area') {
    $resultado = $funcionario->ultimaArea($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'valida_proyecto') {
    $resultado = $funcionario->validaProyecto($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_proyecto') {
    if ($funcionario->insertaProyecto($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultimo_proyecto') {
    $resultado = $funcionario->ultimoProyecto($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'valida_cetap') {
    $resultado = $funcionario->validaCetap($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta_cetap') {
    if ($funcionario->insertaCetap($_GET)) {
        return 'Guardo';
    } else {
        return 'No se guardo';
    }
}

if ($tipo == 'ultima_cetap') {
    $resultado = $funcionario->ultimaCetap($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}
