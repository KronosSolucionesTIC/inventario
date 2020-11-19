<?php include "scripts.php";?>
<?php include "../../controlador/informes_controller.php";?>
<?php $informes = new informesController();?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Informe total</li>
            </ol>
        </nav>
    </div>
</div>
<form>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Proyecto:</label>
    <div class="col-sm-2">
        <select class="form-control" id="fkID_proyecto">
            <?php $informes->getSelectProyecto();?>
        </select>
    </div>
    <label for="inputEmail3" class="col-sm-2 col-form-label">Territorial:</label>
    <div class="col-sm-2">
        <select class="form-control" id="fkID_territorial">
            <?php $informes->getSelectTerritorial();?>
        </select>
    </div>
    <label for="inputEmail3" class="col-sm-2 col-form-label">Estado:</label>
    <div class="col-sm-2">
        <select class="form-control" id="fkID_estado">
            <?php $informes->getSelectEstado();?>
        </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo equipo:</label>
    <div class="col-sm-2">
        <select class="form-control" id="fkID_tipo_equipo">
            <?php $informes->getSelectTipoEquipo();?>
        </select>
    </div>
    <label for="inputEmail3" class="col-sm-2 col-form-label">Modelo:</label>
    <div class="col-sm-2">
        <select class="form-control" id="fkID_modelo">
            <?php $informes->getSelectModelo();?>
        </select>
    </div>
    <label for="inputEmail3" class="col-sm-2 col-form-label">Marca:</label>
    <div class="col-sm-2">
        <select class="form-control" id="fkID_marca">
            <?php $informes->getSelectMarca();?>
        </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Procesador:</label>
    <div class="col-sm-2">
        <select class="form-control" id="fkID_procesador">
            <?php $informes->getSelectProcesador();?>
        </select>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12 text-center">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInventarioScrollable" id="btn_generar">
        Generar informe
      </button>
    </div>
  </div>
</form>
<?php include "modal_inventario_total.php";?>