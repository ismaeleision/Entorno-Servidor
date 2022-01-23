<?php
include "cabecera.php";

?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <div class="container-sm">
        <a href="usuarios.php?accion=mostrarUsuarios"><button type="button" class="btn btn-secondary">Mostrar Usuarios</button></a>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#añadirUsuario">Añadir Usuario</button>
        <a href="controlador.php?accion=pdfUsuarios"><button type="button" class="btn btn-secondary">Imprimir Usuarios</button></a>
      </div>
      <div class="container-md">
        <?php
        if ($_GET) {
          if (isset($_GET['accion'])) {
            $accion = filtrado($_GET['accion']);
            if ($accion == "mostrarUsuarios") {
              $usuarios = selectUsuarios();
              echo "<table class='table table-hover'>";
              echo "<thead>";
              foreach ($usuarios[0] as $key => $value) {
                echo "<td>" . strtoupper($key) . "</td>";
              }
              echo "<td>ACCIONES</td>";
              echo "</thead><tbody>";
              foreach ($usuarios as $usuario) {
                echo "<tr>";
                echo "<td>" . $usuario['dni'] . "</td>";
                echo "<td>" . $usuario['nombre'] . "</td>";
                echo "<td>" . $usuario['apellidos'] . "</td>";
                echo "<td>" . $usuario['edad'] . "</td>";
                echo "<td>" . $usuario['direccion'] . "</td>";
                echo "<td>" . $usuario['poblacion'] . "</td>";
                echo "<td>" . $usuario['telefono'] . "</td>";
                echo "<td>" . $usuario['email'] . "</td>";
                echo "<td><a href='controlador.php?accion=borrarUsuario&dni={$usuario['dni']}'>
                X
              </a>
            </td>";
                echo "</tr>";
              }
              echo "</table>";
            }
          }
        }
        ?>
      </div>
    </div>
  </main>
  <?php
  include "pie.php";
  ?>
</div>


<!-- Modal AÑADIR USUARIO-->
<div class="modal fade" id="añadirUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Insertar Usuario</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action='controlador.php' method='post'>
          <div class="form-group row">
            <label for="dni" class="col-sm-2 col-form-label">DNI</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="dni" name="dni">
            </div>
          </div>
          <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
          </div>
          <div class="form-group row">
            <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="apellidos" name="apellidos">
            </div>
            <div class="form-group row">
              <label for="edad" class="col-sm-2 col-form-label">Edad</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="edad" name="edad" placeholder="Edad">
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="direccion" class="col-sm-2 col-form-label">Direccion</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='direccion' id="direccion" placeholder="Direccion">
            </div>
          </div>
          <div class="form-group row">
            <label for="poblacion" class="col-sm-2 col-form-label">Poblacion</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name='poblacion' id="poblacion" placeholder="Poblacion">
            </div>
          </div>
          <div class="form-group row">
            <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="añadirUsuario" class="btn btn-primary">Guardar</button>
      </div>
      </form>
      <!--Cerrar form -->
    </div>
  </div>
</div>