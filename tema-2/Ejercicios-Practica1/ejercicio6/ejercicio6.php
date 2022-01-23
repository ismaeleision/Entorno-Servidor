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
  //sirve para vincular un php donde he alojado una funcion para hacer mas legible el codigo
  require("letra-dni.php");

  //Obtenemos aleatoriamente un numero de 8 cifras
  $numero = rand(10000000, 99999999);

  //Dividimos entre 23 y lo guardamos en una variabble
  $resultado = $numero % 23;

  /*
  seleccionamos con un case la letra que le corresponde
  En este caso he alojado una funcion con el case por su extension
  */
  $letra = letra_dni($resultado);

  $dni = $numero . $letra;
  echo "Tu dni es $dni";
  ?>
</body>

</html>