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
  $publicacion = array();

  for ($i = 1; $i <= 7; $i++) {
    array_push($publicacion,  array("nombre" => "Fulano", "foto" => "img/img$i.jpg", "like" => rand(0, 9999), "comentario1" => array("nombre" => "Fulano", "mensaje" => "Aqui plasmando el paisaje en mi alma"), "comentario2" => array("nombre" => "Fulgencio", "mensaje" => "Presuntuoso")));
  }

  echo "<div class='container-fluid text-center''>";
  echo "<table class='table table-striped'>";
  echo "<thead><h2>Twitter</h2></thead>";
  echo "<tbody>";
  foreach ($publicacion as $foto) {
    echo "<tr>";
    echo "<td>"
  ?>
    <div class="card" style="width: 45rem; height:25rem;">
      <img src="<?= $foto['foto'] ?>" class="card-img-top" alt="..." width="300" height="200">
      <div class="card-body row align-items-center">
        <h3 class="card-title">
          <img src="img/perfil.jpg" class="img-fluid" width="40" height="40" /><?= $foto['nombre'] . "  " . "<img src='img/corazon.jpg' width='20' height='20' />" . $foto['like'] ?>
        </h3>
        <p class="card-text"><strong><?= $foto['comentario1']['nombre'] ?></strong><?= ": " . $foto['comentario1']['mensaje'] ?></p>
        <p class="card-text"><strong><?= $foto['comentario2']['nombre'] ?></strong><?= ": " . $foto['comentario2']['mensaje'] ?></p>
      </div>
    </div>
  <?php
    echo "<tr>";
    echo "</div>";
  }
  echo "</tbody>";
  echo "</table>";
  echo "</div>";
  ?>
</body>

</html>