<?php
include "lib.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <div id="boton">
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#añadirPalabra">
        Añadir Palabra
      </button>
      <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#eliminarPalabra">
        Eliminar Palabra
      </button>
      <button type="button" class="btn">
        <a href="mostrarDiccionario.php">Mostrar Diccionario</a>
      </button>
    </div>
  </header>
  <div class="container-fluid">
    <div class="container-sm" id="formulario">
      <h3>Introduce la palabra que busques</h3>
      <div>
        <?php
        if ($_GET) {
          if (isset($_GET['palabra']) && isset($_GET['significado'])) {
            $palabra = filtrado($_GET['palabra']);
            $significado = filtrado($_GET['significado']);
            echo "<p>" . $palabra . "----" . $significado;
          }
        }
        ?>
      </div>
      <div>
        <form action="controlador.php" method="post">
          <div>
            <input required type="text" name="palabra">
          </div>
          <div>
            <input type="submit" name="Buscar" value="Buscar">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Palabra Nueva-->
  <div class="modal fade" id="añadirPalabra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir Palabra</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="controlador.php" method="post">
            <div>
              <p>Palabra En Espaniol</p>
              <input required type="text" name="espanol">
            </div>
            <br>
            <div>
              <p>Traduccion al Ingles</p>
              <input required type="text" name="ingles">
            </div>
        </div>
        <input type="hidden" name="añadirPalabra">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Nuevo</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Eliminar Palabra--
la idea es mandarla al controlador y que busque la que coincisda, luego mandarte a un html con la palabra para confirmar la accion
-->
  <div class="modal fade" id="eliminarPalabra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Palabra</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="controlador.php" method="post">
            <div>
              <p>Palabra En Espaniol</p>
              <input required type="text" name="espanol">
            </div>
        </div>
        <input type="hidden" name="eliminarPalabra">
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Eliminar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>