<!-- Modal -->
<div class="modal fade" id="modalEquipo" tabindex="-1" role="dialog" aria-labelledby="modalEquipoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEquipoLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_equipo" method="POST">
          <input type="hidden" id="id_equipo">
          <div class="form-group row">
            <label for="serial_equipo" class="col-sm-3 col-form-label">Serial:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="serial_equipo" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Tipo de equipo:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_tipo_equipo" required="true">
                <?php $equipo->getSelectTipoEquipo(0);?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" class="btn btn-primary" data-target="#modalTipoEquipo" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Marca:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_marca" required="true">
                <?php $equipo->getSelectMarca(0);?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" class="btn btn-primary" data-target="#modalMarca" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Modelo:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_modelo" required="true">
                <?php $equipo->getSelectModelo(0);?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" class="btn btn-primary" data-target="#modalModelo" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Procesador:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_procesador" required="true">
                <?php $equipo->getSelectProcesador(0);?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" class="btn btn-primary" data-target="#modalProcesador" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">RAM:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_ram" required="true">
                <?php $equipo->getSelectRam(0);?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" class="btn btn-primary" data-target="#modalRam" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Sistema operativo:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_sistema_operativo" required="true">
                <?php $equipo->getSelectSistemaOperativo(0);?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              <button type="button" class="btn btn-primary" data-target="#modalSistemaOperativo" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Observaciones:</label>
            <div class="col-sm-7">
              <textarea class="form-control" id="observaciones_equipo" rows="3" style="text-transform:uppercase;"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_equipo">Guardar</button>
              <div class="progress" id="btn_guardando">
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