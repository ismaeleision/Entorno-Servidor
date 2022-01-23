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
  $dni = filtrado($_GET['id']);
  for ($i = 0; $i < count($_SESSION['alumnos']); $i++) {
    if (strcmp($dni, $_SESSION['alumnos'][$i]['dni']) == 0) {
      $alumno = $_SESSION['alumnos'][$i];
    }
  }
  ?>

  <h2 class="h3 mb-2 text-gray-800">Editando alumno <?= $dni; ?></h2>

  <form action="controlador.php" method="post">
    <div class="form-floating">
      <input type="text" name="nombre" class="form-control" value="<?= $alumno['nombre']; ?>" id="floatingInput">
      <label for="floatingInput">Nombre</label>
    </div>

    <div class="form-floating">
      <input type="text" name="apellidos" class="form-control" value="<?= $alumno['apellidos']; ?>" id="floatingInput">
      <label for="floatingInput">Apellidos</label>
    </div>

    <div class="form-floating">
      <input type="number" name="edad" class="form-control" value="<?= $alumno['edad']; ?>" id="floatingInput">
      <label for="floatingInput">Edad</label>
    </div>

    <div class="form-floating">
      <input disabled type="text" name="dni" class="form-control" value="<?= $alumno['dni']; ?>" id="floatingInput">
      <label for="floatingInput">DNI</label>
    </div>

    <input type='hidden' name='dni' value='<?= $alumno['dni']; ?>'>


    <div class="form-floating">
      <input type="email" name="email" class="form-control" value="<?= $alumno['email']; ?>" id="floatingInput">
      <label for="floatingInput">Email</label>
    </div>


    <div class="form-floating">
      <input type="text" name="localidad" class="form-control" value="<?= $alumno['localidad']; ?>" id="floatingInput">
      <label for="floatingInput">Localidad</label>
    </div>

    <div class="form-floating">
      <input type="tel" name="telefono" class="form-control" value="<?= $alumno['telefono']; ?>" id="floatingInput">
      <label for="floatingInput">Móvil</label>
    </div>

    <div class="form-floating">
      <select name="curso">
        <?php
        $cursos = array("1ºDAW", "2ºDAW", "1ºTURISMO", "2ºTURISMO", "3ºMECANICA");
        foreach ($cursos as $curso) {
          if (strcmp($alumno['curso'], $curso) == 0)
            echo "<option value='{$curso}' selected>{$curso}</option>";
          else
            echo "<option value='{$curso}'>{$curso}</option>";
        }
        ?>
      </select>
    </div>

    <!-- Esto va a ser para indicar la acción: modificar alumno -->
    <input type="hidden" name="accion" value="modificarAlumno">

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