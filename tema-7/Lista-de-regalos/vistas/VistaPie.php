<?php
class VistaPie
{
  public function __construct()
  {
    $this->html = "";
  }

  public function render()
  {
    $this->html .= '
    <footer class="py-4 bg-black mt-auto">
      <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
          <div class="text-muted">Copyright &copy; Your Website 2021</div>
            <div>
              <a href="#">Privacy Policy</a>
                &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal AÑADIR LIBRO-->
<div class="modal fade" id="añadirRegalo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Insertar Regalo</h3>
      </div>
      <div class="modal-body">
        <form action="enrutador.php" method="post">
          <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
          </div>
          <div class="form-group row">
            <label for="destinatario" class="col-sm-2 col-form-label">Destinatario</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="destinatario" name="destinatario">
            </div>
          </div>
          <div class="form-group row">
            <label for="precio" class="col-sm-2 col-form-label">Precio</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="precio" name="precio">
            </div>
          </div>
          <div class="form-group row">
            <label for="estado" class="col-sm-2 col-form-label">Estado</label>
            <select class="form-select col-sm-8" id="estado" name="estado">
              <option selected value="pendiente">Pendiente</option>
              <option value="comprado">Comprado</option>
              <option value="envielto">Envuelto</option>
              <option value="entregado">Entregado</option>
            </select>
          </div>
          <input type="hidden" name="usuario" value=' . unserialize($_SESSION["usuario"])[0]->getId() . '>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="accion" value="nuevoRegalo" class="btn btn-primary">Guardar</button>
      </div>
      </form>
      <!--Cerrar form -->
    </div>
  </div>
</div>
</body>
</html>';
    echo $this->html;
  }
}
