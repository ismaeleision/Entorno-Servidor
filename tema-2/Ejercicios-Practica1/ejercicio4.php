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
  //inicializamos las variables con valores aleatorios 
  $a = rand();
  $b = rand();
  $c = rand();

  //Comprobamos que ninguno sea 0 porque sale NaN
  //si no habria que meter condicionales e incorporar las restantes maneras de resolver las ecuaciones
  while ($a == 0 || $b == 0 || $c == 0) {
    $a = rand();
    $b = rand();
    $c = rand();
  }
  echo "$a $b $c <br>";
  //Las operaciones necesarias
  $neg = -1;

  //-b
  $menosb = $b * $neg;

  //b al cuadrado
  $oper1 = pow($b, 2);
  //4*a*c
  $oper2 = 4 * $a * $c;
  $resta = $oper1 - $oper2;
  //sale NaN si $resta es negativo
  $raiz = pow($resta, (1 / 2));
  $dosa = 2 * $a;

  $result1 = ($menosb + $raiz) / $dosa;
  $result2 = ($menosb - $raiz) / $dosa;

  echo "Solucion 1= $result1<br>";
  echo "Solucion 2 = $result2";
  ?>
</body>

</html>