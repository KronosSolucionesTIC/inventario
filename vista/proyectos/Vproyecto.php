 <?php include "../../controlador/proyecto_controller.php";
    session_start();
    $idUsuario = $_SESSION['id_usuario'];
    $permisos = $proyecto->getPermisos($idUsuario,3);
    $permisoconsulta = $proyecto->getPermisosconsulta($idUsuario);
    include "scripts_proyecto.php";
?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Proyectos </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-right">
        <?php if ($permisos[0]["crear"]==1) {
         ?>
        <button class="btn btn-success" data-target="#modalProyecto" data-toggle="modal" id="btn_crear_proyecto" type="button">
            Crear proyecto
        </button>
        <?php } ?>
        <hr></hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-condensed table-bordered display" id="tablaProyecto" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th >
                        PROYECTO
                    </th>
                    <th>
                        Cantidad de Equipos
                    </th>
                    <?php if ($permisos[0]["editar"]==1 || $permisos[0]["eliminar"]==1) {
                    ?>
                    <th>
                        Opciones
                    </th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php getTablaProyecto($permisos,$permisoconsulta);?>
            </tbody>
        </table>
    </div>
</div>
<?php include "modal_proyecto.php";?>
<?php ?>