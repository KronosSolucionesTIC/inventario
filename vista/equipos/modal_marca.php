<!-- Modal -->
<div class="modal fade" id="modalMarca" tabindex="-1" role="dialog" aria-labelledby="modalMarcaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalMarcaLabel">Crear Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_tipo_equipo" method="POST">
          <input type="hidden" id="id_equipo">
          <div class="form-group row">
            <label for="serial_equipo" class="col-sm-3 col-form-label">Nombre marca:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nombre_marca" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="submit" class="btn btn-success" id="btn_guardar_marca">Crear</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
