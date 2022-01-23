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
  //REVISAR NO CONVIERTE LOS STRINGS

  function nombresAlumnos($nombre, $opcion)
  {
    $array = array();
    if ($opcion == "L") {
      //Transformar los strings en minuscula
      foreach ($nombre as $persona) {
        array_unshift($array, strtolower($persona));
      }
    } else if ($opcion == "U") {
      //Transforma los strings en mayuscula
      foreach ($nombre as $persona) {
        array_unshift($array, strtoupper($persona));
      }
    } else if ($opcion == "M") {
      //Convierte los strings en minuscula
      foreach ($nombre as $persona) {
        //Para convertir la primera letra en mayuscula
        array_unshift($array, ucfirst(strtolower(($persona))));
      }
    }
    return $array;
  }

  //Inicio de array con 5 nombres
  $alumnos = array("Romualdo", "Gilgeriano", "Fulgencio", "Ramiro", "Mariano");
  echo "Cadena normal ->  ";
  print_r($alumnos);
  echo "<br>";

  echo "Cadena en minuscula -> ";
  print_r(nombresAlumnos($alumnos, "L"));
  echo "<br>";

  echo "Cadena en mayuscula -> ";
  print_r(nombresAlumnos($alumnos, "U"));
  echo "<br>";

  echo "Cadena con la primera en mayuscula y el resto en minuscula -> ";
  print_r(nombresAlumnos($alumnos, "M"));
  echo "<br>";
  ?>
</body>

</html>