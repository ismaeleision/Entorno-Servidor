<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
</head>

<body>

  <?php
  $libreria = array();
  $contador_historia = 0;
  $contador_ciencia = 0;
  $contador_sci = 0;

  for ($i = 0; $i < 5; $i++) {
    array_push($libreria, array("ISBN" => intval($i) + 1000000000000, "titulo" => "Los Pilares De La Tierra", "descripcion" => "La aventura de poner dos piedras juntas y decir que eran pilares", "categoria" => "historia", "editorial" => "Salvat", "foto" => "imgs/pilares.jpg", "precio" => (9.95 + rand(0, 10))));
    array_push($libreria, array("ISBN" => intval($i) + 2000000000000, "titulo" => "Star Trek", "descripcion" => "3 colegas se caen a un pozo y se quedan atrapados, inventan historias y se las narran para sobrevivir", "categoria" => "scifi", "editorial" => "DeBolsillo", "foto" => "imgs/trek.jpg", "precio" => (9.95 + rand(0, 10))));
    array_push($libreria, array("ISBN" => intval($i) + 3000000000000, "titulo" => "Biologia", "descripcion" => "¿Cómo la naturaleza a creado a esos seres?", "categoria" => "ciencias", "editorial" => "Altea", "foto" => "imgs/biologia.jpg", "precio" => (9.95 + rand(0, 10))));
  }

  //ordenamos el array por categoria
  $orden  = array_column($libreria, 'categoria');
  array_multisort($orden, $libreria);


  echo "<div class='container-fluid'>";
  echo "<h2>Librería Jaroso</h2>";

  echo "<table class='table'>";
  echo "<thead><h4>HISTORIA</h4></thead>";
  echo "<tbody>";
  echo "<tr>";

  foreach ($libreria as $libro) {
    if ($libro['categoria'] == "historia" && $contador_historia < 4) {
      echo "<td>";
      $contador_historia++;
  ?>
      <div class="card" style="width: 18rem;">
        <img src="<?= $libro['foto'] ?>" class="card-img-top" alt="..." width="100" height="200">
        <div class="card-body">
          <h5 class="card-title"><?= $libro['titulo'] ?></h5>
          <p class="card-text"><?= $libro['descripcion'] ?></p>
          <p class="card-text"><?= $libro['precio'] ?>$</p>
        </div>
      </div>
    <?php
      echo "</td>";
    }
  }
  echo "</tr>";
  echo "</tbody>";
  echo "</table>";

  echo "<table class='table'>";
  echo "<thead><h4>CIENCIAS</h4></thead>";
  echo "<tbody>";
  echo "<tr>";
  foreach ($libreria as $libro) {

    if ($libro['categoria'] == "ciencias" && $contador_ciencia < 4) {
      echo "<td>";
      $contador_ciencia++;
    ?>
      <div class="card" style="width: 18rem;">
        <img src="<?= $libro['foto'] ?>" class="card-img-top" alt="..." width="100px" height="200px">
        <div class="card-body">
          <h5 class="card-title"><?= $libro['titulo'] ?></h5>
          <p class="card-text"><?= $libro['descripcion'] ?></p>
          <p class="card-text"><?= $libro['precio'] ?>$</p>
        </div>
      </div>
    <?php
      echo "</td>";
    }
  }
  echo "</tr>";
  echo "</tbody>";
  echo "</table>";

  echo "<table class='table'>";
  echo "<thead><h4>SCI-FI</h4></thead>";
  echo "<tbody>";
  echo "<tr>";

  foreach ($libreria as $libro) {

    if ($libro['categoria'] == "scifi" && $contador_sci < 4) {
      echo "<td>";
      $contador_sci++;
    ?>
      <div class="card" style="width: 18rem;">
        <img src="<?= $libro['foto'] ?>" class="card-img-top" alt="..." width="100" height="200">
        <div class="card-body">
          <h5 class="card-title"><?= $libro['titulo'] ?></h5>
          <p class="card-text"><?= $libro['descripcion'] ?></p>
          <p class="card-text"><?= $libro['precio'] ?>$</p>
        </div>
      </div>
  <?php
      echo "</td>";
    }
  }
  echo "</tr>";
  echo "</tbody>";
  echo "</table>";
  echo "</div>";
  echo "<footer>Realizado por Ismail</footer>";
  ?>
</body>

</html>