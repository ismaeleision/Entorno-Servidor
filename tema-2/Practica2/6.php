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
  require("../Practica2/5.php");

  function reverso($mensaje)
  {
    //Separa el mensaje en digitos de 1 de largo
    $mensaje = str_split($mensaje, 1);
    //creo un array vacio para añadir los valores
    $paquete = array();
    for ($i = 0; $i < count($mensaje); $i++) {
      //Como mete por la izquierda se queda el mensaje al reves
      array_unshift($paquete, $mensaje[$i]);
    }
    //Lo junta del array y lo convierte en string
    $paquete = implode("", $paquete);
    return $paquete;
  }

  $frase = encriptar(reverso($frase), 5);
  echo "<br>Esta es la frase encriptada al reves -> $frase<br>";

  $frase = reverso(desencriptar($frase, 5));
  echo "Esta es la frase desencriptada -> $frase";
  ?>
</body>

</html>