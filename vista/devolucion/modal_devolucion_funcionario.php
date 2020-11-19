<!-- Modal -->
<div class="modal fade" id="modalDevolucionFuncionario" tabindex="-1" role="dialog" aria-labelledby="modalDevolucionFuncionarioLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDevolucionFuncionarioLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_devolucion_funcionario" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="usuario" value="<?php echo $idUsuario; ?>">
          <div class="form-group row">
            <label for="fkID_proyecto_funcionario" class="col-sm-3 col-form-label">Proyecto:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_proyecto_funcionario" required="true">
                <?php $devolucion->getSelectProyecto(0);?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="fkID_territorial_funcionario" class="col-sm-3 col-form-label">Territorial:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_territorial_funcionario" required="true">
                <option value="">Seleccione...</option>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="fkID_persona_funcionario" class="col-sm-3 col-form-label">Funcionario:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_persona_funcionario" required="true">
                <option value="">Seleccione...</option>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="equipos" class="col-sm-3 col-form-label">Equipos:</label>
            <div class="col-sm-7">
            <table class="display" id="divDevolucionFuncionario" style="width:100%">
              <thead>
                <tr>
                  <th>
                    Serial
                  </th>
                  <th>
                    Tipo equipo
                  </th>
                  <th>
                    Seleccionar
                  </th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          </div>
          <div class="form-group row">
            <label for="observaciones_funcionario" class="col-sm-3 col-form-label">Observaciones:</label>
            <div class="col-sm-7">
              <textarea class="form-control" id="observaciones_funcionario" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_devolucion_funcionario">Guardar</button>
              <div class="progress" id="btn_guardando_funcionario">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">Guardando...</div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar equipo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar el registro?
        <div class="progress" id="btn_eliminando">
          <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">Eliminando...
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancelar">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btn_eliminar_equipo" name="btn_eliminar_equipo">Eliminar</button>
      </div>
    </div>
  </div>
</div>
