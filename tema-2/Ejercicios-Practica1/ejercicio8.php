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
  function tombola()
  {
    //$valor vamos a convertirlo en un array de valores, para que los guarde y se pueda comprobar que sus valores no se repitan
    $valor = array();
    for ($i = 0; $i < 8; $i++) {
      $num = rand(1, 49);
      while (in_array($num, $valor) == true) {
        $num = rand(1, 49);
      }
      array_push($valor, $num);
    }
    array_push($valor, rand(0, 9));
    return $valor;
  }
  //NO SE PUEDEN REPETIR NUMEROS
  //consiste en 7 bloques de numeros entre 1 y 49 y 1 bloque del 0 al 9

  $ganador = tombola();

  echo "<h1>La combinacion ganadora es </h1>";
  var_dump($ganador);
  ?>
</body>

</html>