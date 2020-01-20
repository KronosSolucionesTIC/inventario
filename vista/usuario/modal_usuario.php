<!-- Modal -->
<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUsuarioLabel">Crear Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_Usuario">
          <input type="hidden" id="id_usuario">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Empleado:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_persona" >
                <?php getSelectPersona();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              <button type="button" class="btn btn-primary" data-target="#modalEmpleado" data-toggle="modal" id="btnadicionempleado"><i class="fas fa-plus"></i></button>
            </div> 
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Cargo:</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" id="nombre_cargo">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Usuario:</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" id="nombre_usuario" >
            </div>
            <div class="col-sm-2 text-danger">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Password:</label>
            <div class="col-sm-7">
              <input class="form-control" type="Password" id="pass_usuario">
            </div>
            <div class="col-sm-2 text-danger">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_Usuario">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>