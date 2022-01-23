<?php
include "cabecera.php";

//Filtra los datos para evitar la intrusión de codigo en las peticiones
function filtrado($datos)
{
  $datos = trim($datos); // Elimina espacios antes y después de los datos
  $datos = stripslashes($datos); // Elimina backslashes \
  $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
  return $datos;
}
?>

<div id="layoutSidenav_content">


  <?php
  $nombre = filtrado($_GET['id']);
  for ($i = 0; $i < count($_SESSION['cursos']); $i++) {
    if (strcmp($nombre, $_SESSION['cursos'][$i]['nombre']) == 0) {
      $curso = $_SESSION['cursos'][$i];
    }
  }
  ?>

  <h2 class="h3 mb-2 text-gray-800">Editando Curso <?= $nombre ?></h2>

  <form action="controlador.php" method="post">
    <div class="form-floating">
      <input type="text" name="nombre" class="form-control" value="<?= $curso['nombre']; ?>" id="floatingInput">
      <label for="floatingInput">Nombre</label>
    </div>

    <div class="form-floating">
      <input type="text" name="etapa" class="form-control" value="<?= $curso['etapa']; ?>" id="floatingInput">
      <label for="floatingInput">Etapa</label>
    </div>

    <div class="form-floating">
      <input disabled type="number" name="curso" class="form-control" value="<?= $curso['curso']; ?>" id="floatingInput">
      <label for="floatingInput">Curso</label>
    </div>
    <input type='hidden' name='curso' value='<?= $curso['curso']; ?>'>

    <!-- Esto va a ser para indicar la acción: modificar curso -->
    <input type="hidden" name="accion" value="modificarCurso">

    <div class='row'>
      <div class='col-2'>
        <button class="w-100 btn btn-lg btn-primary mb-1 mt-1" type="submit">Modificar</button>
        <button class="w-100 btn btn-lg btn-primary" type="reset">Deshacer</button>
      </div>
    </div>
  </form>

  <?php
  include "pie.php";
  ?>
</div>