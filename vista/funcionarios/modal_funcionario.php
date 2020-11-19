<!-- Modal -->
<div class="modal fade" id="modalFuncionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFuncionarioLabel">Crear Funcionario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_funcionario">
          <input type="hidden" id="id_persona">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Nombres:</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" id="nombres_persona" style="text-transform:uppercase;" required="true">
            </div>
            <div class="col-sm-2 text-danger">
              * 
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Apellidos:</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" id="apellidos_persona" style="text-transform:uppercase;" required="true">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Cédula:</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" id="documento_persona" style="text-transform:uppercase;" required="true">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Teléfono:</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" id="telefono_persona" style="text-transform:uppercase;">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Celular:</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" id="celular_persona" style="text-transform:uppercase;">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-7">
              <input class="form-control" type="email" id="email_persona" style="text-transform:uppercase;">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Proyecto:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_proyecto" required="true">
                <?php $funcionario->getSelectProyecto();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" class="btn btn-primary" data-target="#modalProyecto" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Terrritorial:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_territorial" required="true">
                <?php $funcionario->getSelectTerritorial();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" class="btn btn-primary" data-target="#modalTerritorial" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Area:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_area" required="true">
                <?php $funcionario->getSelectArea();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" class="btn btn-primary" data-target="#modalArea" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Tipo funcionario:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_tipo_persona" required="true">
                <?php $funcionario->getSelectTipoFuncionario();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">CETAP:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_cetap">
                <?php $funcionario->getSelectCetap();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              &nbsp;
              <button type="button" class="btn btn-primary" data-target="#modalCetap" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_funcionario">Guardar</button>
              <div class="progress" id="btn_guardando">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  Guardando...
                </div>
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
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar funcionario</h5>
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
        <button type="button" class="btn btn-danger" id="btn_eliminar_funcionario" name="btn_eliminar_funcionario">Eliminar</button>
      </div>
    </div>
  </div>
</div>