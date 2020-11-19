<?php include "../../controlador/funcionario_controller.php";?>
<?php
session_start();
$idUsuario    = $_SESSION['id_usuario'];
$funcionarios = new funcionario();
$permisos     = $funcionarios->getPermisos($idUsuario, 14);
?>
 <?php $funcionario = new funcionarioController();?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Funcionarios</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-right">
        <?php if ($permisos[0]["crear"] == 1) {
    ?>
        <button class="btn btn-success" data-target="#modalFuncionario" data-toggle="modal" id="btn_crear_funcionario" type="button">
            Crear funcionario
        </button>
        <?php }?>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="display" id="tablaFuncionarios" style="width:100%">
            <thead>
                <tr>
                    <th>
                        Nombres
                    </th>
                    <th>
                        Apellidos
                    </th>
                    <th>
                        Documento
                    </th>
                    <th>
                        Proyecto
                    </th>
                    <th>
                        Territorial
                    </th>
                    <th>
                        Area
                    </th>
                    <th>
                        Tipo funcionario
                    </th>
                    <?php if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
    ?>
                    <th>
                        Opciones
                    </th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                <?php $funcionario->getTablaFuncionarios($permisos);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "modal_funcionario.php";?>
<?php include "modal_territorial.php";?>
<?php include "modal_area.php";?>
<?php include "modal_proyecto.php";?>
<?php include "modal_cetap.php";?>
<?php include "scripts.php";?>