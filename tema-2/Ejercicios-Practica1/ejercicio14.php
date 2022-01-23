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

  //creo un array bidimensional de 3x10
  $alumnos = array(
    array("nombre" => "R", "materia" => "Ciencias", "nota" => "4"),
    array("nombre" => "O", "materia" => "Lengua-Española", "nota" => "5"),
    array("nombre" => "M", "materia" => "Fisica", "nota" => "7"),
    array("nombre" => "U", "materia" => "Quimica", "nota" => "5"),
    array("nombre" => "A", "materia" => "Ingles", "nota" => "3"),
    array("nombre" => "L", "materia" => "Frances", "nota" => "4"),
    array("nombre" => "D", "materia" => "Aleman", "nota" => "1"),
    array("nombre" => "I", "materia" => "Ciencias", "nota" => "2"),
    array("nombre" => "O", "materia" => "Fisica", "nota" => "8"),
    array("nombre" => "N", "materia" => "Ciencias", "nota" => "7")
  );

  //ordenacion por orden de notas
  foreach ($alumnos as $key => $valor) {
    //se guardan los valores de nota en $notas
    $notas[$key] = $valor["nota"];
  }
  /*
 * dado el array creado $notas se ordena $alumnos 
  *array_multisort sirve para los array multidimensionales, los otros son para unidimensionales
  *SORT_DESC es para ordenar el array $notas de manera decreciente para que ordene $alumnos en referencia a $notas
  */
  array_multisort($notas, SORT_DESC, $alumnos);
  echo "<h3>Los alumnos ordenados porlas notas obtenidas durante el curso</h3>";
  print_r(($alumnos));


  //ordena por orden de la primer key
  SORT($alumnos);

  //pinta los valores del array
  echo "<h3>Los alumnos ordenados por nombre </h3>";
  print_r($alumnos);
  echo "<br>";

  //defino la variable vueltas y nota
  $vueltas = 0;
  $nota = 0;
  //calcular la media de la nota del curso
  foreach ($alumnos as $key => $valor) {
    //Hay que convertir el valor de la columna nota porque se extrae como string
    $nota += intval($valor["nota"]);
    $vueltas += 1;
  }
  echo "<br>";
  $media = $nota / $vueltas;
  echo "<br>La media de las notas del curso es $media<br>";

  //inicializo la variable para que no salte warning, aunque el programa funciones correctamente
  $suspensos = 0;
  //Calcular los alumnos suspensos
  foreach ($alumnos as $key => $value) {
    if (intval($value["nota"] <= 4)) {
      $suspensos++;
    }
  }
  echo "<br> Hay $suspensos suspensos en el curso transcurrido";
  ?>
</body>

</html>