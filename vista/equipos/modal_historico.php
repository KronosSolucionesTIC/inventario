<!-- Modal -->
<?php
setlocale(LC_ALL, "es_ES");
?>
<div class="modal fade" id="historicoModalScrollable" tabindex="-1" role="dialog" aria-labelledby="historicoModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="historicoModalScrollableTitle">Historico de Equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div id="tablaHistorico">
<table class="table table-bordered" >
  <thead>
    <tr>
      <th scope="col" class="text-center">
        <img src="../imagenes/logo_lunel.png" class="img-fluid">
      </th>
      <th scope="col" colspan="3" class="text-center">
        <h4>
          <strong>
            Software Inventory<br>
            Historico del equipo
          </strong>
        </h4>
      </th>
      <th scope="col" class="text-center">
        <strong>
            Fecha y hora impresion:<br>
            <?php
echo date('Y-m-d H:i:s');
?>
        </strong>
      </th>
    </tr>
    <tr>
      <th scope="col" colspan="5" class="text-center">

      </th>
    </tr>
    <tr>
      <th scope="col">Fecha y hora</th>
      <th scope="col">Persona entrega</th>
      <th scope="col">Persona recibe</th>
      <th scope="col">Movimiento</th>
      <th scope="col">Consecutivo</th>
    </tr>
  </thead>
  <tbody>
    <?php $equipo->getTablaHistorico($_GET["id_equipo"]);?>
    <tr>
      <td scope="col" colspan="5">
        <strong>Equipo</strong><br>
        Serial: <?php echo $datosEquipo[0]["serial_equipo"]; ?><br>
        Tipo de equipo: <?php echo $datosEquipo[0]["nombre_tipo_equipo"]; ?><br>
        Modelo: <?php echo $datosEquipo[0]["nombre_modelo"]; ?><br>
        Marca: <?php echo $datosEquipo[0]["nombre_marca"]; ?><br>
        Procesador: <?php echo $datosEquipo[0]["nombre_procesador"]; ?><br>
        Estado: <?php echo $datosEquipo[0]["nombre_estado_equipo"]; ?><br>
        Observaciones: <?php echo $datosEquipo[0]["observaciones_equipo"]; ?><br>
      </td>
    </tr>
    <tr>
      <td scope="col" colspan="5" class="text-right"><p><small><em>Fecha y hora impresion :<?php echo date('Y-m-d H:i:s'); ?></small></em></p></td>
    </tr>
  </tbody>
</table>
</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn_imprimir"><i class="fas fa-print"></i></button>
        <button type="button" class="btn btn-success" id="btn_excel"><i class="fas fa-file-excel"></i></button>
        <button type="button" class="btn btn-danger" id="btn_pdf"><i class="far fa-file-pdf"></i></button>
      </div>
    </div>
  </div>
</div>
