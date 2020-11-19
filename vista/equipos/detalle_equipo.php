<?php
include "scripts.php";
include "../../controlador/equipo_controller.php";
$equipo = new equipoController();
//Consulto los datos del equipo
$datosEquipo = $equipo->getDatosEquipoID($_GET["id_equipo"]);
?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            	<li class="breadcrumb-item" aria-current="page" id="miga_equipo"><ins class="text-primary" style="cursor: pointer">Equipos</ins></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle de equipo</li>
            </ol>
        </nav>
    </div>
</div>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Descripción</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Hoja de vida</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Reparaciones</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
		<div class="row">
			<div class="col-md-12 text-center">
				<h4><strong>Detalle de equipo</strong></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Serial:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEquipo[0]["serial_equipo"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Tipo equipo:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEquipo[0]["nombre_tipo_equipo"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Modelo:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEquipo[0]["nombre_modelo"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Marca:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEquipo[0]["nombre_marca"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Procesador:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEquipo[0]["nombre_procesador"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Estado:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEquipo[0]["nombre_estado_equipo"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Observaciones:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEquipo[0]["observaciones_equipo"]; ?></label>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Persona a cargo:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEquipo[0]["nombres_persona"] . ' ' . $datosEquipo[0]["apellidos_persona"]; ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Proyecto:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEquipo[0]["nombre_proyecto"] ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Territorial:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEquipo[0]["nombre_territorial"] ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Area:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEquipo[0]["nombre_area"] ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 text-right">
				<label><strong>Cargo:</strong></label>
			</div>
			<div class="col-md-9 text-left">
				<label><?php echo $datosEquipo[0]["nombre_cargo"] ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#historicoModalScrollable">
  					Ver historico equipo
				</button>
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  		La hoja de vida del equipo esta contemplada para la siguiente fase del desarrollo del aplicativo :D.
	</div>
  	<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  		Las reparaciones del equipo esta contemplada para la siguiente fase del desarrollo del aplicativo :D.
  	</div>
</div>
<?php include "modal_historico.php";?>