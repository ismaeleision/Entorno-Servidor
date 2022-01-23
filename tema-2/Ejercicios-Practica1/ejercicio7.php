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
  $valores = array(rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10));

  //print_r sirve para imprimir los valores almacenados en un array
  print_r($valores);

  for ($i = 0; $i < sizeof($valores); $i++) {
    echo "<br> La tabla de multiplicar de $valores[$i] <br>";
    for ($j = 1; $j <= 10; $j++) {
      $res = $i * $j;
      echo " $i x $j = $res <br>";
    }
    echo "<br>";
  }
  ?>
</body>

</html>