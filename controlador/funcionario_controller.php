<?php
include dirname(__file__, 2) . '/modelo/funcionario.php';

class funcionarioController extends funcionario
{

    public function __construct()
    {
        # code...
    }

    //Tabla de funcionarios
    public function getTablaFuncionarios($permisos)
    {
        //Instancia del funcionario
        $funcionarios = new funcionario();
        //Lista del menu Nivel 1
        $listaFuncionarios = $funcionarios->getFuncionarios();
        if ($permisos[0]["consultar"] == 1) {
            //Se recorre array de nivel 1
            if (isset($listaFuncionarios)) {
                for ($i = 0; $i < sizeof($listaFuncionarios); $i++) {
                    echo '<tr>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-funcionario="' . $listaFuncionarios[$i]["id_persona"] . '">' . $listaFuncionarios[$i]["nombres_persona"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-funcionario="' . $listaFuncionarios[$i]["id_persona"] . '">' . $listaFuncionarios[$i]["apellidos_persona"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-funcionario="' . $listaFuncionarios[$i]["id_persona"] . '">' . $listaFuncionarios[$i]["documento_persona"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-funcionario="' . $listaFuncionarios[$i]["id_persona"] . '">' . $listaFuncionarios[$i]["nombre_proyecto"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-funcionario="' . $listaFuncionarios[$i]["id_persona"] . '">' . $listaFuncionarios[$i]["nombre_territorial"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-funcionario="' . $listaFuncionarios[$i]["id_persona"] . '">' . $listaFuncionarios[$i]["nombre_area"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-funcionario="' . $listaFuncionarios[$i]["id_persona"] . '">' . $listaFuncionarios[$i]["nombre_tipo_persona"] . '</td>';
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '<td>';
                    }
                    if ($permisos[0]["editar"] == 1) {
                        echo '<button type="button" class="btn btn-warning" data-target="#modalFuncionario" data-toggle="modal" name="btn_editar" data-id-funcionario="' . $listaFuncionarios[$i]["id_persona"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                    };
                    if ($permisos[0]["eliminar"] == 1) {
                        echo ' <button type="button" class="btn btn-danger" name="btn_eliminar" data-id-funcionario="' . $listaFuncionarios[$i]["id_persona"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                    }
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen funcionarios</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }

    //Funcion para cargar select territorial
    public function getSelectTerritorial()
    {
        //Instancia del funcionario
        $funcionario = new Funcionario();
        //Lista del menu Nivel 1
        $listaTerritorial = $funcionario->getTerritoriales();
        //Se recorre array de nivel 1
        if (isset($listaTerritorial)) {
            echo '<option selected value="0">Seleccione...</option>';
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

    //Funcion para cargar select area
    public function getSelectArea()
    {
        //Instancia del funcionario
        $funcionario = new Funcionario();
        //Lista del menu Nivel 1
        $listaArea = $funcionario->getAreas();
        //Se recorre array de nivel 1
        if (isset($listaArea)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaArea); $i++) {
                //Valida si es el valor
                if ($valor == $listaArea[$i]["id_area"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaArea[$i]["id_area"] . '" ' . $seleccionado . '>' . $listaArea[$i]["nombre_area"] . '</option>';
            }
        }
    }

    //Funcion para cargar select tipo funcionario
    public function getSelectTipoFuncionario()
    {
        //Instancia del funcionario
        $funcionario = new Funcionario();
        //Lista del menu Nivel 1
        $listaTipoFuncionario = $funcionario->getTipoFuncionario();
        //Se recorre array de nivel 1
        if (isset($listaTipoFuncionario)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipoFuncionario); $i++) {
                //Valida si es el valor
                if ($valor == $listaTipoFuncionario[$i]["id_tipo_persona"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaTipoFuncionario[$i]["id_tipo_persona"] . '" ' . $seleccionado . '>' . $listaTipoFuncionario[$i]["nombre_tipo_persona"] . '</option>';
            }
        }
    }

    //Funcion para cargar select proyecto
    public function getSelectProyecto()
    {
        //Instancia del funcionario
        $funcionario = new Funcionario();
        //Lista del menu Nivel 1
        $listaProyectos = $funcionario->getProyectos();
        //Se recorre array de nivel 1
        if (isset($listaProyectos)) {
            echo '<option selected value="0">Seleccione...</option>';
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

    //Funcion para cargar select cetap
    public function getSelectCetap()
    {
        //Instancia del funcionario
        $funcionario = new Funcionario();
        //Lista del menu Nivel 1
        $listaCetap = $funcionario->getCetap();
        //Se recorre array de nivel 1
        if (isset($listaCetap)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaCetap); $i++) {
                //Valida si es el valor
                if ($valor == $listaCetap[$i]["id_cetap"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaCetap[$i]["id_cetap"] . '" ' . $seleccionado . '>' . $listaCetap[$i]["nombre_cetap"] . '</option>';
            }
        }
    }
}
