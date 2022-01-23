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
  $num = array();
  $contador = 0;
  $saco = 0;

  //va dando vueltas desde el 1 al 10 e introduce esos valores en el array $num
  for ($i = 1; $i <= 10; $i++) {
    array_push($num, $i);
  }


  for ($i = 0; $i < count($num); $i++) {
    //los numeros impares los va mostrando
    if ($num[$i] % 2 != 0) {
      echo "$num[$i], ";
      //los numeros pares los suma en una variable y hace la media entre ellos 
    } else if ($num[$i] % 2 == 0) {
      $saco += $num[$i];
      $contador += 1;
    }
  }
  echo "<br>" . $saco / $contador;


  ?>
</body>

</html>