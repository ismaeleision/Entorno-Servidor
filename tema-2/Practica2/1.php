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
  //Dado un array obtiene la primera posicion del valor 
  function primeraPosicion($array, $valor)
  {
    return strpos($array, $valor);
  }

  //Dado un array obtiene la ultima posicion del valor
  function ultimaPosicion($array, $valor)
  {
    //se le da la vuelta a al cadena
    strrev($array);

    //como la cadena esta invertida hay que restarla a la longitud total de la cadena
    return (intval(strlen($array)) - intval(strpos($array, $valor)));
  }

  $cadena1 = "Lo que estoy escribiendo es un string";

  $cadena2 = "muuuuuy largo";
  echo ("$cadena2<br>");

  //Dos cadenas se concatenan por la union de un punto
  $cadena3 = $cadena1 . " " . $cadena2;
  echo ("$cadena3<br>");

  echo ("La posicion de la primera e es  " . primeraPosicion($cadena3, "e") . "<br>");
  echo ("La posicion de la ultima u es " . ultimaPosicion($cadena3, "u"));
  echo ("La posicion de la palabra texto es " . primeraPosicion($cadena3, "texto"));
  ?>
</body>

</html>