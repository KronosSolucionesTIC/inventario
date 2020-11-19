<!-- Modal -->
<div class="modal fade" id="modalProyecto" tabindex="-1" role="dialog" aria-labelledby="modalProyectoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalProyectoLabel">Crear Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_Proyecto">
          <input type="hidden" id="id_proyecto">
          <input type="hidden" id="fkID_proyecto">
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Nombre del Proyecto:</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" id="nombre_proyecto" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-2 text-danger">
            </div>
          </div> 
          <div class="form-group row">
          <div class="col-sm-12">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item active" aria-current="page">Agregar Territoriales</li>
                  </ol>
              </nav>
          </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Territorial:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_territorial2" name="fkID_territorial2">
                <?php getSelectTerritorial();?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Dirección:</label>
            <div class="col-sm-7">
              <input class="form-control" type="text" id="direccion_territorial" style="text-transform:uppercase;">
            </div>
          </div>
          <div class="form-group row float-center" >
            <div class="col-sm-12 text-center">
              <button data-accion="agregar" type="button" class="btn btn-primary" id="btn_agregar_Territorial">Agregar</button>
            </div>
          </div>  
          <div class="form-group row float-center">
            <div class="card col-sm-12">
            <div class="card-header text-center">
              Territoriales Asignadas
            </div>
            <div class="card-body" style="background:#D9EEED;" id="territorial_agregada">
              
            </div>
            </div>
        </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_Proyecto">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>