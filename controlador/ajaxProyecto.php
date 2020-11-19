<?php
include dirname(__file__, 2) . '/modelo/proyecto.php';

$proyecto = new Proyecto();
$tipo=isset($_GET['tipo'])?$_GET['tipo']:""; 


if ($tipo == 'inserta') {
    if ($proyecto->insertaUsuario($_GET)) {  
        echo $r='1';
    } else {
        echo $r='0';
    }
};

if ($tipo == 'inserta_proyecto') {
    if ($proyecto->insertaProyecto($_GET)) {  
        $resultado = $proyecto->consultaidProyecto($_GET);
            if ($resultado) {
                echo json_encode($resultado); //imprime el json
            } else {
                return 'No se consulto';
            }
    } else {
        echo $r='0';
    }
};

if ($tipo == 'consultaterritorial') {
    $resultado = $proyecto->getTerritorial($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
};

if ($tipo == 'edita') {
    if ($proyecto->editaProyecto($_GET)) {
        $resultado = $proyecto->consultaidProyecto($_GET);
            if ($resultado) {
                echo json_encode($resultado); //imprime el json
            } else {
                return 'No se consulto';
            }
    } else {
        echo $r='0';
    }
};

if ($tipo == 'elimina_logico') {
    if ($proyecto->eliminaLogicoProyecto($_GET)) {
        return '1';
    } else {
        return '0';
    }
};

if ($tipo == 'agregar_territorial') {
    if ($proyecto->insertaTerritorial($_GET)) {   
      echo $r="hola";
    } else {
        echo $r=" No hola";
    }
};

if ($tipo == 'consultaproyecto') {
    $resultado = $proyecto->consultaDatosProyecto($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo 'No se consulto'; 
    }
};

if ($tipo == 'consultadatosterritoriales') {
    $resultado = $proyecto->consultaDatosTerritorial($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
};

if ($tipo == 'elimina_territorial') {
    if ($proyecto->eliminaTerritorial($_GET)) {
        echo $r='1';
    } else {
        echo $r='0';
    }
};

if ($tipo == 'edita_territorial') {
    if ($proyecto->editaTerritorial($_GET)) {
        echo $r='1';
    } else {
        echo $r='0';
    }
};
