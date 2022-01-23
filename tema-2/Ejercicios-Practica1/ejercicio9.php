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

  for ($i = 1; $i <= 5; $i++) {

    //genera aleatoriamente un codigo entre 0 y 255 que son los valores que admite el rgb
    $r = rand(0, 255);
    $g = rand(0, 255);
    $b = rand(0, 255);

    //lio de comillas y puntos para convertir adecuadamente los datos para que los procese el html 
    $rgb = 'rgb(' . $r . ',' . $g . ',' . $b . ')';
  ?>
    <svg width="100" height="100">
      <circle cx="50" cy="50" r="40" stroke="black" stroke-width="4" fill=<?php echo $rgb ?> />
    </svg>

  <?php
    echo "$rgb";
  }
  ?>
</body>

</html>