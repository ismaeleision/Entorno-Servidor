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
  /**
   * Lo he planteado al reves, la cadena de proceso se mueve a la derecha
   * por lo que quita procesos por la derecha y añade por la izquierda
   */

  /**
   * Dado un array($cadena)
   * Quita el primer valor del array y le introduce el siguiente
   */
  function añadir(&$array, $valor)
  {
    foreach ($valor as $val) {
      array_unshift($array, $val);
    }
  }

  /**
   * Dado un array quita el ultimo valor de ese array
   */
  function quitar(&$array)
  {
    array_pop($array);
  }

  /**
   * Dado un array muestra su contenido
   */
  function mostrar($array)
  {
    foreach ($array as $valor) {
      echo (intval($valor) . "-");
    }
    echo "<br>";
  }

  //inicializamos el array x
  $x = array(1, 2, 3);
  mostrar($x);

  $y = array(56, 85, 155);
  añadir($x, $y);
  mostrar($x);
  quitar($x);
  mostrar($x);

  ?>
</body>

</html>