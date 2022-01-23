<?php
include "cabecera.php";
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <div class="container-sm">
        <a href="prestamos.php?accion=mostrarPrestamos"><button type="button" class="btn btn-secondary">Mostrar Prestamos</button></a>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#añadirPrestamo">Añadir Prestamo</button>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#buscarPrestamo">Buscar Prestamo</button>
      </div>
      <?php
      if ($_GET) {
        if (isset($_GET['accion'])) {
          if ($_GET['accion'] == "mostrarPrestamos") {
            $prestamos = selectPrestamos();
          }
        }
        //Codigo para la busqueda del Prestamo
        if (isset($_GET['buscarPrestamo'])) {
          $estado = filtrado($_GET['estado']);
          $dni = filtrado($_GET['dni']);
          $prestamos = selectPrestamoEstadoDni($estado, $dni);
        }
        echo "<table class='table'>";
        echo "<thead>";
        foreach ($prestamos[0] as $key => $value) {
          echo "<td>" . strtoupper($key) . "</td>";
        }
        echo "<td>ACCIONES</td>";
        echo "</thead><tbody>";
        foreach ($prestamos as $prestamo) {
          echo "<tr>";
          echo "<td>" . $prestamo['id'] . "</td>";
          echo "<td>" . $prestamo['ISBN'] . "</td>";
          echo "<td>" . $prestamo['dni'] . "</td>";
          echo "<td>" . $prestamo['fecha_inicio'] . "</td>";
          echo "<td>" . $prestamo['fecha_fin'] . "</td>";
          echo "<td>" . $prestamo['estado'] . "</td>";
          echo "<td><a href='controlador.php?accion=editarPrestamo&id={$prestamo['id']}'>*-*</a></td>";
          echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
      }
      ?>
    </div>
  </main>
  <?php
  include "pie.php";
  ?>
</div>

<!-- Modal AÑADIR PRESTAMO-->
<div class="modal fade" id="añadirPrestamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Insertar Prestamo</h3>
      </div>
      <div class="modal-body">
        <form action='controlador.php' method='post' enctype="multipart/form-data">
          <!--Importante el enctype o no hace nada-->
          <div class="form-group row">
            <label for="titulo" class="col-sm-2 col-form-label">ISBN Libro</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="isbn" name="isbn">
            </div>
          </div>
          <div class="form-group row">
            <label for="subtitulo" class="col-sm-2 col-form-label">DNI Usuario</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="dni" name="dni">
            </div>
          </div>
          <div class="form-group row">
            <label for="descripcion" class="col-sm-2 col-form-label">Fecha Prestamo</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="fecha_ini" name="fecha_ini">
            </div>
            <div class="form-group row">
              <label for="autor" class="col-sm-2 col-form-label">Fecha Devolucion</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
              </div>
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
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" name="añadirPrestamo" class="btn btn-primary">Guardar</button>
          </div>
        </form>
        <!--Cerrar form -->
      </div>
    </div>
  </div>
</div>

<!--MODAL BUSCAR PRESTAMO-->
<div class="modal fade" id="buscarPrestamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Buscar Prestamo</h3>
      </div>
      <div class="modal-body">
        <!--Inicio formulario-->
        <form action='prestamos.php' method='get'>
          <div class="form-group row">
            <label for="estado" class="col-sm-2 col-form-label">Estado</label>
            <select class="form-select" id="estado" name="estado">
              <option selected value="activo">Activo</option>
              <option value="devuelto">Devuelto</option>
              <option value="retrasado1Mes">Retrasado 1 Mes</option>
              <option value="retrasado1Año">Retrasado 1 Año</option>
            </select>
          </div>
          <div class="form-group row">
            <label for="dni" class="col-sm-2 col-form-label">Dni</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="dni" name="dni">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="buscarPrestamo" class="btn btn-primary">Buscar</button>
      </div>
      </form>
    </div>
    <!--Cerrar form -->
  </div>
</div>