<?php
include "../../controlador/devolucion_controller.php";
session_start();
$idUsuario       = $_SESSION['id_usuario'];
$devolucion      = new devolucion();
$permisos        = $devolucion->getPermisos($idUsuario, 9);
$permisoconsulta = $devolucion->getPermisosconsulta($idUsuario);
$devolucion      = new devolucionController();
include "scripts.php";
?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Devolución</li>
            </ol>
        </nav>
    </div>
</div>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Devolución de proyecto</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Devolución de técnico</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Devolución de funcionarios</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <br>
        <div class="row">
            <div class="col-md-12 text-right">
                <?php if ($permisos[0]["crear"] == 1) {?>
                    <button class="btn btn-success" data-target="#modalDevolucionProyecto" data-toggle="modal" id="btn_crear_devolucion" type="button">
                        Crear devolución
                    </button>
                <?php }?>
                <hr></hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="display" id="tablaDevolucion" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Consecutivo
                            </th>
                            <th>
                                Soporte
                            </th>
                                <?php if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {?>
                            <th>
                                Opciones
                            </th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $devolucion->getTablaDevolucion($permisos, $permisoconsulta);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        Las reparaciones del devolucion esta contemplada para la siguiente fase del desarrollo del aplicativo :D.
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <br>
        <div class="row">
            <div class="col-md-12 text-right">
                <?php if ($permisos[0]["crear"] == 1) {?>
                    <button class="btn btn-success" data-target="#modalDevolucionFuncionario" data-toggle="modal" id="btn_crear_devolucion_funcionario" type="button">
                        Crear devolución
                    </button>
                <?php }?>
                <hr></hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="display" id="tablaDevolucionFuncionario" style="width:100%">
                    <thead>
                        <tr>
                            <th>
                                Consecutivo
                            </th>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Proyecto
                            </th>
                            <th>
                                Territorial
                            </th>
                            <th>
                                Acta
                            </th>
                                <?php if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {?>
                            <th>
                                Opciones
                            </th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $devolucion->getTablaDevolucionFuncionario($permisos, $permisoconsulta);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "modal_devolucion_proyecto.php";?>
<?php include "modal_devolucion_funcionario.php";?>
<?php include "modal_acta_funcionario.php";?>