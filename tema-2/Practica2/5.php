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
  //clave en los encriptados es para añadir valos a los ASCII
  //funcion para encriptar 
  function encriptar($mensaje, $clave)
  {
    $mensaje_encriptado = array();
    //elimino los espacios en blanco del mensaje
    $mensaje = trim($mensaje);
    //divido el mensaje en partes de longitud 1
    $mensaje = str_split($mensaje,  1);
    foreach ($mensaje as $letra) {
      //cada letra la convierto en ASCII Y LE SUMO EL VALOR DEL ENCRIPTADO
      array_push($mensaje_encriptado, (ord($letra) + $clave));
    }
    //junto cada valor ASCII unido por una comilla
    $mensaje_encriptado = implode(", ", $mensaje_encriptado);
    return $mensaje_encriptado;
  }

  function desencriptar($mensaje, $clave)
  {
    $mensaje_encriptado = array();
    //Separo el string en un array indicandole el corte en la comilla
    $mensaje = explode(",", $mensaje);
    foreach ($mensaje as $letra) {
      //convierto el valor ASCII menos la clave en su letra correspondiente y lo meto al array
      array_push($mensaje_encriptado, (chr(intval($letra) - $clave)));
    }
    //Junto las letras para recuperar el mensaje
    $mensaje_encriptado = implode("", $mensaje_encriptado);
    return $mensaje_encriptado;
  }

  $frase = "la mesa esta puesta cerca del mesero";
  echo "El mensaje original es -> ";
  echo "$frase";

  $frase = encriptar($frase, 3);
  echo "<br>El mensaje encriptado es -> ";
  echo "$frase";

  $frase = desencriptar($frase, 3);
  echo "<br>El mensaje desencriptado es -> ";
  echo "$frase";
  ?>
</body>

</html>