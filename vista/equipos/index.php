<?php
include "../../controlador/equipo_controller.php";
session_start();
$idUsuario       = $_SESSION['id_usuario'];
$equipo          = new equipo();
$permisos        = $equipo->getPermisos($idUsuario, 2);
$permisoconsulta = $equipo->getPermisosconsulta($idUsuario);
$equipo          = new equipoController();
?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Equipos</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-right">
        <?php if ($permisos[0]["crear"] == 1) {
    ?>
        <button class="btn btn-success" data-target="#modalEquipo" data-toggle="modal" id="btn_crear_equipo" type="button">
            Crear equipo
        </button>
        <?php }?>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="display" id="tablaEquipos" style="width:100%">
            <thead>
                <tr>
                    <th>
                        Serial
                    </th>
                    <th>
                        Tipo equipo
                    </th>
                    <th>
                        Modelo
                    </th>
                    <th>
                        Marca
                    </th>
                    <th>
                        Procesador
                    </th>
                    <th>
                        Estado
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
                <?php $equipo->getTablaEquipos($permisos, $permisoconsulta);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "scripts.php";?>
<?php include "modal_equipo.php";?>
<?php include "modal_tipo_equipo.php";?>
<?php include "modal_modelo.php";?>
<?php include "modal_marca.php";?>
<?php include "modal_procesador.php";?>
<?php include "modal_ram.php";?>
<?php include "modal_sistema_operativo.php";?>