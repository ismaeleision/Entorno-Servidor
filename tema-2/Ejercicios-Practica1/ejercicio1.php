<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <?php
  //asignar variables aleatorios
  $primera = rand();
  $segunda = rand();

  //muestro los valores de cada variable
  echo " primera $primera";
  echo " segunda $segunda";
  echo "<br>";

  //diferencia entre las dos variables
  $dif = $primera - $segunda;
  echo " la diferencia es $dif";

  //division entre las dos variables
  $div = $primera / $segunda;
  echo " la division es $div";
  ?>

</body>

</html>