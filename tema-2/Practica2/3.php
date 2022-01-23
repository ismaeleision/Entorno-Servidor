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
  //inicializo la variable ip con un string 
  $ip = "192.168.11.200";
  echo "$ip";
  echo "<br>";

  //Separar los digitos en un array usando explode
  $ip_array = explode(".", $ip);
  print_r($ip_array);
  echo "<br>";

  //Juntar el array pero uniendo con puntos
  $ip_reco = implode(":", $ip_array);
  echo "$ip_reco";
  echo "<br>";
  ?>
</body>

</html>