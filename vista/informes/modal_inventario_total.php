<!-- Modal -->
<?php
setlocale(LC_ALL, "es_ES");
?>
<div class="modal fade" id="modalInventarioScrollable" tabindex="-1" role="dialog" aria-labelledby="modalInventarioScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalInventarioScrollableTitle">Inventario total </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div id="tablaInventario">
            <table class="table table-bordered" >
              <thead>
                <tr>
                  <th scope="col" colspan="2" class="text-center">
                    <img src="../imagenes/logo_lunel.png" class="img-fluid">
                  </th>
                  <th scope="col" colspan="6" class="text-center">
                    <h4>
                      <strong>
                        Software Inventory<br>
                        Inventario total
                      </strong>
                    </h4>
                  </th>
                  <th scope="col" colspan="2" class="text-center">
                    <strong>
                        Fecha y hora impresion:<br>
                        <?php echo date('Y-m-d H:i:s'); ?>
                    </strong>
                  </th>
                </tr>
                <tr>
                  <th scope="col" colspan="10" class="text-center"></th>
                </tr>
                <tr>
                  <th scope="col">Proyecto</th>
                  <th scope="col">Territorial</th>
                  <th scope="col">Area</th>
                  <th scope="col">Persona a cargo</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Tipo de equipo</th>
                  <th scope="col">Modelo</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Procesador</th>
                  <th scope="col">Serial</th>
                </tr>
                </thead>
                <tbody id="contenidoInventario">
                  <?php $informes->getTablaInventarioTotal('');?>
                  <tr>
                    <td scope="col" colspan="10" class="text-right"><p><small><em>Fecha y hora impresion :<?php echo date('Y-m-d H:i:s'); ?></small></em></p></td>
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
