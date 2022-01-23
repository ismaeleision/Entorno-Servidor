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
  //asignamos el valor correspondiente al ejercicio
  $cadena1 = "hola a todo el mundo";
  $cadena2 = "mi nombre es ismael artero egea";

  //cadena3 sera la concatenacion de las cadenas 1 y 2
  $cadena3 = $cadena1 . $cadena2;
  echo "$cadena3";

  //cadena1 tendra la concatenacion de si mismo con cadena 2
  echo "<br>";
  $cadena1 = $cadena1 . $cadena2;
  echo "$cadena1"
  /*
  Y a tomar por culo
   */
  ?>
</body>

</html>