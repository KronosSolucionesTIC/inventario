<?php
include dirname(__file__, 2) . '/modelo/empleado.php';

class EmpleadoController extends EmpleadoDao
{

    public function __construct()
    {
        # code...
    }

    //Trae el genero
    public function getSelectGenero($valor)
    {
        //Instancia del DAO
        $empleado = new EmpleadoDAO();
        //Lista del menu Nivel 1
        $listagenero = $empleado->Generos();
        //Se recorre array de nivel 1
        if (isset($listagenero)) {
            echo '<option selected>Seleccione...</option>';
            for ($i = 0; $i < sizeof($listagenero); $i++) {
                //Valida si es el valor
                if ($valor == $listagenero[$i]["id_genero"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listagenero[$i]["id_genero"] . '" ' . $seleccionado . '>' . $listagenero[$i]["nombre_genero"] . '</option>';
            }
        }
    }

    //Trae la nacionalidad
    public function getSelectNacionalidad($valor)
    {
        //Instancia del DAO
        $empleado = new EmpleadoDAO();
        //Lista del menu Nivel 1
        $listaNacionalidad = $empleado->Nacionalidad();
        //Se recorre array de nivel 1
        if (isset($listaNacionalidad)) {
            echo '<option selected>Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaNacionalidad); $i++) {
                //Valida si es el valor
                if ($valor == $listaNacionalidad[$i]["id_nacionalidad"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaNacionalidad[$i]["id_nacionalidad"] . '" ' . $seleccionado . '>' . $listaNacionalidad[$i]["nombre_nacionalidad"] . '</option>';
            }
        }
    }

    //Trae el estado civil
    public function getSelectEstadoCivil($valor)
    {
        //Instancia del DAO
        $empleado = new EmpleadoDAO();
        //Lista del menu Nivel 1
        $listaEstadoCivil = $empleado->EstadoCivil();
        //Se recorre array de nivel 1
        if (isset($listaEstadoCivil)) {
            echo '<option selected>Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaEstadoCivil); $i++) {
                //Valida si es el valor
                if ($valor == $listaEstadoCivil[$i]["id_estado_civil"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaEstadoCivil[$i]["id_estado_civil"] . '" ' . $seleccionado . '>' . $listaEstadoCivil[$i]["nombre_estado_civil"] . '</option>';
            }
        }
    }

    //Trae los departamentos
    public function getSelectDepartamento($valor)
    {
        //Instancia del empleado
        $empleado = new EmpleadoDAO();
        //Lista del menu Nivel 1
        $listaDepartamentos = $empleado->Departamentos();
        //Se recorre array de nivel 1
        if (isset($listaDepartamentos)) {
            echo '<option selected>Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaDepartamentos); $i++) {
                //Valida si es el valor
                if ($valor == $listaDepartamentos[$i]["id_departamento"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaDepartamentos[$i]["id_departamento"] . '" ' . $seleccionado . '>' . utf8_encode($listaDepartamentos[$i]["nombre_departamento"]) . '</option>';
            }
        }
    }

    //Trae las ciudades
    public function getSelectCiudad($valor)
    {
        //Instancia del empleado
        $empleado = new EmpleadoDAO();
        //Lista del menu Nivel 1
        $listaCiudades = $empleado->Ciudades();
        //Se recorre array de nivel 1
        if (isset($listaCiudades)) {
            echo '<option selected>Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaCiudades); $i++) {
                //Valida si es el valor
                if ($valor == $listaCiudades[$i]["id_ciudad"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaCiudades[$i]["id_ciudad"] . '" ' . $seleccionado . '>' . utf8_encode($listaCiudades[$i]["nombre_ciudad"]) . '</option>';
            }
        }
    }

    //Trae las EPS
    public function getSelectEps($valor)
    {
        //Instancia del empleado
        $empleado = new EmpleadoDAO();
        //Lista del menu Nivel 1
        $listaEps = $empleado->Eps();
        //Se recorre array de nivel 1
        if (isset($listaEps)) {
            echo '<option selected>Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaEps); $i++) {
                //Valida si es el valor
                if ($valor == $listaEps[$i]["id_eps"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaEps[$i]["id_eps"] . '" ' . $seleccionado . '>' . $listaEps[$i]["nombre_eps"] . '</option>';
            }
        }
    }

    //Trae los fondos de pension
    public function getSelectPension($valor)
    {
        //Instancia del empleado
        $empleado = new EmpleadoDAO();
        //Lista del menu Nivel 1
        $listaPension = $empleado->Pension();
        //Se recorre array de nivel 1
        if (isset($listaPension)) {
            echo '<option selected>Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaPension); $i++) {
                //Valida si es el valor
                if ($valor == $listaPension[$i]["id_pension"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaPension[$i]["id_pension"] . '" ' . $seleccionado . '>' . $listaPension[$i]["nombre_pension"] . '</option>';
            }
        }
    }

    //Trae los fondos de cesantias
    public function getSelectCesantias($valor)
    {
        //Instancia del empleado
        $empleado = new EmpleadoDAO();
        //Lista del menu Nivel 1
        $listaCesantias = $empleado->Cesantias();
        //Se recorre array de nivel 1
        if (isset($listaCesantias)) {
            echo '<option selected>Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaCesantias); $i++) {
                //Valida si es el valor
                if ($valor == $listaCesantias[$i]["id_cesantias"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaCesantias[$i]["id_cesantias"] . '" ' . $seleccionado . '>' . $listaCesantias[$i]["nombre_cesantias"] . '</option>';
            }
        }
    }

    //Trae los bancos
    public function getSelectBancos($valor)
    {
        //Instancia del empleado
        $empleado = new EmpleadoDAO();
        //Lista del menu Nivel 1
        $listaBancos = $empleado->Bancos();
        //Se recorre array de nivel 1
        if (isset($listaBancos)) {
            echo '<option selected>Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaBancos); $i++) {
                //Valida si es el valor
                if ($valor == $listaBancos[$i]["id_banco"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaBancos[$i]["id_banco"] . '" ' . $seleccionado . '>' . $listaBancos[$i]["nombre_banco"] . '</option>';
            }
        }
    }

    //Consulta empleado por id de usuario
    public function getEmpleadoUsuario($usuario)
    {
        //Instancia del empleado
        $empleado = new EmpleadoDAO();
        //Lista del menu Nivel 1
        $datosEmpleado = $empleado->EmpleadoUsuario($usuario);
        //Se recorre array de nivel 1
        if (isset($datosEmpleado)) {
            return $datosEmpleado;
        }
    }
}
