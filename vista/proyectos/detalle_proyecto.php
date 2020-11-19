<?php
include "../../controlador/proyecto_controller.php";
//Consulto los datos del equipo
$id_proyecto = $_GET["id_proyecto"];
?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            	<li class="breadcrumb-item" aria-current="page" id="miga_proyecto"><ins class="text-primary" style="cursor: pointer">Proyectos</ins></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle de proyecto</li>
            </ol>
        </nav>
    </div>
</div>
<div class="tab-content" id="nav-tabContent">
	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
		<div class="row">
			<div class="col-md-12 text-center">
				<h4><strong>Detalle del Proyecto</strong></h4><br>
			</div>
		</div>
		<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-condensed table-bordered display" id="" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th >
                        PROYECTO
                    </th>
                    <?php 
                    $usuario = new Proyecto();
                    	$listaTipoelementos = $usuario->getTipoEquipo();

                    	for ($i = 0; $i < sizeof($listaTipoelementos); $i++) {
			                echo '<th>' . $listaTipoelementos[$i]["nombre_tipo_equipo"] . '</th>';
			            }
                     ?>
                </tr>
            </thead>
            <tbody>
                <?php getTablaDetalleProyecto($id_proyecto);?>
            </tbody>
        </table>
    </div>
</div>
		</div>
</div>
<div class="tab-content" id="nav-tabContent">
	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
		<div class="row">
			<div class="col-md-12 text-center">
				<br>
				<h4><strong>Detalle de las Territoriales</strong></h4><br>
			</div>
		</div>
		<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-condensed table-bordered display" id="" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th >
                        TERRITORIAL
                    </th>
                    <?php 
                    $usuario = new Proyecto();
                    	$listaTipoelementos = $usuario->getTipoEquipo();

                    	for ($i = 0; $i < sizeof($listaTipoelementos); $i++) {
			                echo '<th>' . $listaTipoelementos[$i]["nombre_tipo_equipo"] . '</th>';
			            }
                     ?>
                </tr>
            </thead>
            <tbody>
                <?php getTablaDetalleProyecto($id_proyecto);?>
            </tbody>
        </table>
    </div>
</div>
		</div>
</div>
<?php //include "modal_historico.php";
	  include "scripts_proyecto.php";
?>