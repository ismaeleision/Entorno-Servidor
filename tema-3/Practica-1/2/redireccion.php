<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <?php
  $categorias = explode(",", $_COOKIE['miCookie']);

  echo "<table class='table'>";

  foreach ($categorias as $categoria) {
    if (strlen($categoria) > 1) {
      echo "<tr><td>";
      echo "<img src='imgs/$categoria.jpg' width='300' height='300'>";
      echo "</td></tr>";
    }
  }

  echo "</table>";
  ?>
</body>

</html>