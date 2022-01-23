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

  //almacenar en la variable $radio un valor aleatorio
  $radio = rand();

  /*
    calcular y mostrar el volumen de una esfera de ese radio
    M_PI es una constante con el valor pi
    pow(base, exponente) sirve para elevar un numero a cualquier exponente
    */
  $volumen = (4 * M_PI * pow($radio, 3)) / 3;

  //mostramos la variable por pantalla
  echo "$volumen unidades métricas contiene la esfera";
  ?>
</body>

</html>