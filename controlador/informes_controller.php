<?php
include dirname(__file__, 2) . '/modelo/informes.php';

class informesController extends informes
{

    public function __construct()
    {
        # code...
    }

    //Funcion para cargar select proyecto
    public function getSelectProyecto()
    {
        //Instancia de informes
        $informes = new informes();
        //Lista del menu Nivel 1
        $listaProyectos = $informes->getProyectos();
        //Se recorre array de nivel 1
        if (isset($listaProyectos)) {
            echo '<option selected value="0">Todos...</option>';
            for ($i = 0; $i < sizeof($listaProyectos); $i++) {
                //Valida si es el valor
                if ($valor == $listaProyectos[$i]["id_proyecto"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaProyectos[$i]["id_proyecto"] . '" ' . $seleccionado . '>' . $listaProyectos[$i]["nombre_proyecto"] . '</option>';
            }
        }
    }

    //Funcion para cargar select territorial
    public function getSelectTerritorial()
    {
        //Instancia del informes
        $informes = new informes();
        //Lista del menu Nivel 1
        $listaTerritorial = $informes->getTerritoriales();
        //Se recorre array de nivel 1
        if (isset($listaTerritorial)) {
            echo '<option selected value="0">Todas...</option>';
            for ($i = 0; $i < sizeof($listaTerritorial); $i++) {
                //Valida si es el valor
                if ($valor == $listaTerritorial[$i]["id_territorial"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaTerritorial[$i]["id_territorial"] . '" ' . $seleccionado . '>' . $listaTerritorial[$i]["nombre_territorial"] . '</option>';
            }
        }
    }

    //Funcion para cargar select estado
    public function getSelectEstado()
    {
        //Instancia del informes
        $informes = new informes();
        //Lista del menu Nivel 1
        $listaEstados = $informes->getEstado();
        //Se recorre array de nivel 1
        if (isset($listaEstados)) {
            echo '<option selected value="0">Todos...</option>';
            for ($i = 0; $i < sizeof($listaEstados); $i++) {
                //Valida si es el valor
                if ($valor == $listaEstados[$i]["id_estado_equipo"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaEstados[$i]["id_estado_equipo"] . '" ' . $seleccionado . '>' . $listaEstados[$i]["nombre_estado_equipo"] . '</option>';
            }
        }
    }

    //Trae los tipos de equipo
    public function getSelectTipoEquipo()
    {
        //Instancia del informes
        $informes = new informes();
        //Lista del menu Nivel 1
        $listaTipoEquipo = $informes->getTipoEquipo();
        //Se recorre array de nivel 1
        if (isset($listaTipoEquipo)) {
            echo '<option selected value="">Todos...</option>';
            for ($i = 0; $i < sizeof($listaTipoEquipo); $i++) {
                //Valida si es el valor
                if ($valor == $listaTipoEquipo[$i]["id_tipo_equipo"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaTipoEquipo[$i]["id_tipo_equipo"] . '" ' . $seleccionado . '>' . utf8_encode($listaTipoEquipo[$i]["nombre_tipo_equipo"]) . '</option>';
            }
        }
    }

    //Trae los modelos
    public function getSelectModelo()
    {
        //Instancia del informes
        $informes = new informes();
        //Lista del menu Nivel 1
        $listaModelo = $informes->getModelo();
        //Se recorre array de nivel 1
        if (isset($listaModelo)) {
            echo '<option selected value="">Todos...</option>';
            for ($i = 0; $i < sizeof($listaModelo); $i++) {
                //Valida si es el valor
                if ($valor == $listaModelo[$i]["id_modelo"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaModelo[$i]["id_modelo"] . '" ' . $seleccionado . '>' . utf8_encode($listaModelo[$i]["nombre_modelo"]) . '</option>';
            }
        }
    }

    //Trae las marcas
    public function getSelectMarca()
    {
        //Instancia del informes
        $informes = new informes();
        //Lista del menu Nivel 1
        $listaMarca = $informes->getMarca();
        //Se recorre array de nivel 1
        if (isset($listaMarca)) {
            echo '<option selected value="">Todas...</option>';
            for ($i = 0; $i < sizeof($listaMarca); $i++) {
                //Valida si es el valor
                if ($valor == $listaMarca[$i]["id_marca"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaMarca[$i]["id_marca"] . '" ' . $seleccionado . '>' . utf8_encode($listaMarca[$i]["nombre_marca"]) . '</option>';
            }
        }
    }

    //Trae los procesadores
    public function getSelectProcesador()
    {
        //Instancia del informes
        $informes = new informes();
        //Lista del menu Nivel 1
        $listaProcesador = $informes->getProcesador();
        //Se recorre array de nivel 1
        if (isset($listaProcesador)) {
            echo '<option selected value="">Todos...</option>';
            for ($i = 0; $i < sizeof($listaProcesador); $i++) {
                //Valida si es el valor
                if ($valor == $listaProcesador[$i]["id_procesador"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaProcesador[$i]["id_procesador"] . '" ' . $seleccionado . '>' . utf8_encode($listaProcesador[$i]["nombre_procesador"]) . '</option>';
            }
        }
    }

    //Tabla inventario total
    public function getTablaInventarioTotal($where)
    {
        //Instancia del informes
        $informes = new informes();
        //Lista del menu Nivel 1
        $listaEquipos = $informes->getInventarioTotal($where);
        //Se recorre array de nivel 1
        if (isset($listaEquipos)) {
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
            }
        } else {
            echo '<tr>';
            echo '<td colspan="10">No existen equipos</td>';
            echo '</tr>';
        }
    }
}
