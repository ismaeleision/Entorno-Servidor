<?php
include "scripts.php";
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
  <div class="container-fluid">
    <div class="container-sd">
      <a href="controlador.php?accion=destruir">
        <img src="img/eliminar.png" width="50px" height="50px">
      </a>
    </div>
    <div class="container-sd">
      <img src="img/<?= $_SESSION['intentos'] ?>.jpg" width="200px" height="200px">
    </div>
    <div class="container-md">
      <?= pintarjuego(); ?>
    </div>
    <div class="container-md">
      <?= pintarProbadas(); ?>
    </div>
    <div class="container-sd">
      <form action="controlador.php" method="post" class="mb-2 row">
        <div class="col-auto">
          <input type="text" name="letra">
        </div>
        <div class="col-auto">
          <input type="submit" name="probar" value="Probar">
        </div>
      </form>
    </div>
  </div>
</body>

</html>