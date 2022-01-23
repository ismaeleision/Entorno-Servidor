<?php
include "cabecera.php";
//Coge el ISBN del libro y le hace el select para coger los datos del mismo libro
if ($_GET) {
  if (isset($_GET['accion'])) {
    if ($_GET['accion'] == "mostrar") {
      $id = filtrado($_GET['id']);
      $prestamo = selectPrestamosId($id);
?>
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid">
            <div class="container">
              <form action='controlador.php' method='post'>
                <div class="form-group row">
                  <label for="titulo" class="col-sm-2 col-form-label">ISBN</label>
                  <input type="text" disabled class="form-control" id="isbn" name="isbn" value="<?= $prestamo[0]["ISBN"] ?>">
                </div>
                <div class="form-group row">
                  <label for="subtitulo" class="col-sm-2 col-form-label">DNI</label>
                  <input type="text" disabled class="form-control" id="dni" name="dni" value="<?= $prestamo[0]['dni'] ?>">
                </div>
                <div class="form-group row">
                  <label for="descripcion" class="col-sm-2 col-form-label">Fecha Inicio Prestamo</label>
                  <input type="date" disabled class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?= $prestamo[0]['fecha_inicio'] ?>">
                  <div class="form-group row">
                    <label for="autor" class="col-sm-2 col-form-label">Fecha Fin Prestamo</label>
                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="<?= $prestamo[0]['fecha_fin'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                  <select class="form-select" id="estado" name="estado">
                    <option selected value="activo">Activo</option>
                    <option value="devuelto">Devuelto</option>
                    <option value="retrasado1Mes">Retrasado 1 Mes</option>
                    <option value="retrasado1Año">Retrasado 1 Año</option>
                  </select>
                </div>

                <!--Para saber que libro estamos modificando-->
                <input type="hidden" name="id" value="<?= $prestamo[0]['id'] ?>">
                <?= $prestamo[0]['id'] ?>
                <input type="hidden" id="isbn" name="isbn" value="<?= $prestamo[0]["ISBN"] ?>">

                <div class="form-group row">
                  <button type="submit" name="editarPrestamo" class="btn btn-primary">Guardar Cambios</button>
                </div>
              </form>
            </div>
          </div>
        </main>

  <?php
    }
  }
}
  ?>

  <?php
  include "pie.php";
  ?>
      </div>