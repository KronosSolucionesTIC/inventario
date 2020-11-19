<!-- Modal -->
<?php
setlocale(LC_ALL, "es_ES");
include "funciones.php";
?>
<div class="modal fade" id="modalActaFuncionario" tabindex="-1" role="dialog" aria-labelledby="modalActaFuncionarioTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalActaFuncionarioTitle">Acta de Devolución</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div id="contenidoActa" class="table-responsive">
            <table class="table table-bordered" >
              <thead>
                <tr>
                  <th scope="col" colspan="4" class="text-center">
                    <img src="../imagenes/logo_lunel.png" class="img-fluid">
                  </th>
                  <th scope="col" colspan="4" class="text-center">
                    <h4>
                      <strong>
                        Software Inventory<br>
                        Acta de devolución
                      </strong>
                    </h4>
                  </th>
                  <th scope="col" colspan="4" class="text-center">
                    <strong>
                      Fecha y hora impresion:<br>
                      <?php echo date('Y-m-d H:i:s'); ?>
                    </strong>
                  </th>
                </tr>
                <tr>
                  <th scope="col" colspan="12" class="text-center">
                    ACTA DE DEVOLUCIÓN No <label id="conse_devolucion"></label>
                  </th>
                </tr>
              </thead>
            </table>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" colspan="12">1. PERSONA QUE ENTREGA</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="col" colspan="6">Nombre completo:</td>
                  <td scope="col" colspan="6" id="persona_entrega"></td>
                </tr>
                <tr>
                  <td scope="col" colspan="6">Cargo:</td>
                  <td scope="col" colspan="6"><label id="cargo_entrega"></label></td>
                </tr>
              </tbody>
            </table>
            <table id="contenidoActaDevolucionFuncionario" class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" colspan="12">2. EQUIPOS COMPUTACIONALES ASIGNADOS</th>
                </tr>
                <tr>
                  <th scope="col">Serial</th>
                  <th scope="col">Tipo equipo</th>
                  <th scope="col">Modelo</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Sistema operativo</th>
                  <th scope="col">RAM</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" colspan="12">3. PERSONA QUE RECIBE</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="col" colspan="6">Nombre completo:</td>
                  <td scope="col" colspan="6" id="persona_recibe"></td>
                </tr>
                <tr>
                  <td scope="col" colspan="6">Cargo:</td>
                  <td scope="col" colspan="6"><label id="cargo_recibe"></label></td>
                </tr>
              </tbody>
            </table>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" colspan="12">4. FIRMAS</th>
                </tr>
                <tr>
                  <th scope="col" colspan="6"><div align="center">Persona que entrega</div></th>
                  <th scope="col" colspan="6"><div align="center">Persona que recibe</div></th>
                </tr>
                <tr>
                  <th scope="col" colspan="6">Firma</th>
                  <th scope="col" colspan="6">Firma</th>
                </tr>
                <tr>
                  <th scope="col" colspan="6">No documento</th>
                  <th scope="col" colspan="6">No documento</th>
                </tr>
              </thead>
            </table>
            <table class="table table-bordered" >
              <tbody>
                <tr>
                  <td scope="col" colspan="12" class="text-right"><p><small><em>Fecha y hora impresion :<?php echo date('Y-m-d H:i:s'); ?></small></em></p></td>
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
