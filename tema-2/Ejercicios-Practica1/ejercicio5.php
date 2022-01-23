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
  //Hacerlo de manera manual que reconozca los numeros y los muestre a letras
  //metemos en una variable un valor aleatorio entre 0 y 99
  $numero = rand(0, 99);

  //intdiv hace la division de un numero por otro y se queda con el cociente de la operacion
  $dividendo = intdiv($numero, 10);
  $divisor = $numero % 10;

  echo "El numero es $numero <br>";

  if ($dividendo != 0) {
    switch ($dividendo) {
      case 1:
        $letras = "diez";
        break;
      case 2:
        $letras = "veinte";
        break;
      case 3:
        $letras = "treinta";
        break;
      case 4:
        $letras = "cuarenta";
        break;
      case 5:
        $letras = "cincuenta";
        break;
      case 6:
        $letras = "sesenta";
        break;
      case 7:
        $letras = "setenta";
        break;
      case 8:
        $letras = "ochenta";
        break;
      case 9:
        $letras = "noventa";
        break;
      default:
        $letras = "patata1";
        break;
    }
  }
  if ($divisor != 0) {
    switch ($divisor) {
      case 1:
        $letras = $letras . "yuno";
        break;
      case 2:
        $letras = $letras . "ydos";
        break;
      case 3:
        $letras = $letras . "ytres";
        break;
      case 4:
        $letras = $letras . "ycuatro";
        break;
      case 5:
        $letras = $letras . "ycinco";
        break;
      case 6:
        $letras = $letras . "yseis";
        break;
      case 7:
        $letras = $letras . "ysiete";
        break;
      case 8:
        $letras = $letras . "yocho";
        break;
      case 9:
        $letras = $letras . "ynueve";
        break;
      default:
        $letras = $letras . "1patata";
        break;
    }
  }

  //mostramos el numero escrito en letras
  echo "Se escribe $letras";
  ?>

</body>

</html>