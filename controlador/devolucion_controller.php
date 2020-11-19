<?php
include dirname(__file__, 2) . '/modelo/devolucion.php';

class devolucionController extends Devolucion
{
    public function __construct()
    {
        # code...
    }

    //Tabla de devolucion
    public function getTablaDevolucion($permisos, $permisosConsulta)
    {
        //Instancia del devolucion
        $devolucion = new devolucion();
        //Lista del menu Nivel 1
        $listaDevolucion = $devolucion->getDevolucion($permisosConsulta);
        //Se recorre array de nivel 1
        if ($permisos[0]["consultar"] == 1) {
            if (isset($listaDevolucion)) {
                for ($i = 0; $i < sizeof($listaDevolucion); $i++) {
                    echo '<tr>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaDevolucion[$i]["id_devolucion"] . '">' . $listaDevolucion[$i]["fecha_devolucion"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaDevolucion[$i]["id_devolucion"] . '">' . $listaDevolucion[$i]["conse_devolucion"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaDevolucion[$i]["id_devolucion"] . '"><a target="_blank" href="../documentos/' . $listaDevolucion[$i]["url_devolucion"] . '">' . $listaDevolucion[$i]["url_devolucion"] . '</a></td>';
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '<td>';
                    }
                    if ($permisos[0]["consultar"] == 1) {
                        echo '<button type="button" class="btn btn-primary" data-target="#modalVerDevolucion" data-toggle="modal" name="btn_ver" data-id-devolucion="' . $listaDevolucion[$i]["id_devolucion"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                    };
                    if ($permisos[0]["editar"] == 1) {
                        echo '<button type="button" class="btn btn-warning" data-target="#modalEquipo" data-toggle="modal" name="btn_editar" data-id-equipo="' . $listaDevolucion[$i]["id_devolucion"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                    };
                    if ($permisos[0]["eliminar"] == 1) {
                        echo '<button type="button" class="btn btn-danger" name="btn_eliminar" data-id-equipo="' . $listaDevolucion[$i]["id_devolucion"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                    }
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen equipos</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }

    //Funcion para cargar select proyecto
    public function getSelectProyecto()
    {
        //Instancia del devolucion
        $devolucion = new Devolucion();
        //Lista del menu Nivel 1
        $listaDevolucion = $devolucion->getProyectos();
        //Se recorre array de nivel 1
        if (isset($listaDevolucion)) {
            echo '<option selected value="">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaDevolucion); $i++) {
                //Valida si es el valor
                if ($valor == $listaDevolucion[$i]["id_proyecto"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaDevolucion[$i]["id_proyecto"] . '" ' . $seleccionado . '>' . $listaDevolucion[$i]["nombre_proyecto"] . '</option>';
            }
        }
    }

    //Tabla de devolucion funcionario
    public function getTablaDevolucionFuncionario($permisos, $permisosConsulta)
    {
        //Instancia del devolucion
        $devolucion = new devolucion();
        //Lista del menu Nivel 1
        $listaDevolucion = $devolucion->getDevolucionFuncionario($permisosConsulta);
        //Se recorre array de nivel 1
        if ($permisos[0]["consultar"] == 1) {
            if (isset($listaDevolucion)) {
                for ($i = 0; $i < sizeof($listaDevolucion); $i++) {
                    echo '<tr>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaDevolucion[$i]["id_devolucion"] . '">' . $listaDevolucion[$i]["conse_devolucion"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaDevolucion[$i]["id_devolucion"] . '">' . $listaDevolucion[$i]["fecha_devolucion"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaDevolucion[$i]["id_devolucion"] . '">' . $listaDevolucion[$i]["nombre_proyecto"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaDevolucion[$i]["id_devolucion"] . '">' . $listaDevolucion[$i]["nombre_territorial"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-equipo="' . $listaDevolucion[$i]["id_devolucion"] . '"><a target="_blank" href="../documentos/' . $listaDevolucion[$i]["url_devolucion"] . '">' . $listaDevolucion[$i]["url_devolucion"] . '</a></td>';
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '<td>';
                    }
                    if ($permisos[0]["consultar"] == 1) {
                        echo '<button type="button" class="btn btn-primary" data-target="#modalActaFuncionario" data-toggle="modal" name="btn_acta_funcionario" data-id-devolucion="' . $listaDevolucion[$i]["id_devolucion"] . '"><i class="fas fa-file-alt"></i></button>&nbsp;';
                    };
                    if ($permisos[0]["editar"] == 1) {
                        echo '<button type="button" class="btn btn-warning" data-target="#modalEquipo" data-toggle="modal" name="btn_editar" data-id-equipo="' . $listaDevolucion[$i]["id_devolucion"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                    };
                    if ($permisos[0]["eliminar"] == 1) {
                        echo '<button type="button" class="btn btn-danger" name="btn_eliminar" data-id-equipo="' . $listaDevolucion[$i]["id_devolucion"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                    }
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen equipos</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }
}
