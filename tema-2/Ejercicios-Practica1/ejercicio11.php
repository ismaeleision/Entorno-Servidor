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
  //creo a manos el array bidimensional vacio para solo ir añadiendo los valores
  $ar = array(array(), array(), array(), array(), array(), array(), array());
  //de forma automatica
  for ($i = 0; $i < 7; $i++) {
    for ($j = 0; $j < 7; $j++) {
      //si la posicion i es igual a j entonces es de la diagonal ascendente
      if ($i == $j) {
        array_push($ar[$i], 1);
        //si la posicion j es igual a la longitud de j menos i entonces es la diagonal ascendente
      } else if ($j == (6 - $i)) {
        array_push($ar[$i], 1);
      } else {
        //si no es un valor de la diagonal le mete un valor entre 2 y 9
        array_push($ar[$i], rand(2, 9));
      }
    }
  }
  foreach ($ar as $arrais) {
    foreach ($arrais as $key => $valor) {
      echo "$valor ";
    }
    echo "<br>";
  }

  //suma de columnas
  for ($i = 0; $i < 7; $i++) {
    $sum_c = 0;
    for ($j = 0; $j < 7; $j++) {
      $sum_c += intval($ar[$i][$j]);
    }
    echo "La suma de la columna " . $i . " es $sum_c<br>";
  }

  //sumar filas
  for ($j = 0; $j < 7; $j++) {
    $sum_f = 0;
    for ($i = 0; $i < 7; $i++) {
      $sum_f += intval($ar[$i][$j]);
    }
    echo "La suma de la fila " . $j . " es $sum_f<br>";
  }

  ?>
</body>

</html>