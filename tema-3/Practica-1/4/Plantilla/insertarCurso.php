<?php
include "cabecera.php";

?>

<!-- Begin Page Content -->
<div id="layoutSidenav_content">

  <!-- Page Heading -->
  <h2 class="h3 mb-2 text-gray-800">Nuevo Curso</h2>

  <form action="controlador.php" method="post">
    <div class="form-floating">
      <input type="text" name="nombre" class="form-control">
      <label for="floatingInput">Nombre</label>
    </div>

    <div class="form-floating">
      <input type="text" name="etapa" class="form-control">
      <label for="floatingInput">Etapa</label>
    </div>

    <div class="form-floating">
      <input type="number" name="curso" class="form-control">
      <label for="floatingInput">Curso</label>
    </div>

    <!-- Esto va a ser para indicar la acción: insertar alumno -->
    <input type="hidden" name="accion" value="insertarCurso">

    <div class='row'>
      <div class='col-2'>
        <button class="w-100 btn btn-lg btn-primary mb-1 mt-1" type="submit">Insertar</button>
        <button class="w-100 btn btn-lg btn-primary" type="reset">Deshacer</button>
      </div>
    </div>
  </form>

  <?php
  include "pie.php";
  ?>
</div>
<!-- /.container-fluid -->