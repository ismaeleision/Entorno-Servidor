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
   * Funcion que dada un array asociativo obtiene el iva que le corresponde al producto y se lo aplica al precio.
   * return el precio final del producto
   */
  function subtotal($linea_pedido)
  {
    //si iva es 1 entonces le corresponde el 10%
    if ($linea_pedido['iva_r'] == 1) {
      $impuestos = $linea_pedido['precio'] * 0.10;
      //si iva es 0 le corresponde 21%
    } else if ($linea_pedido['iva_r'] == 0) {
      $impuestos = $linea_pedido['precio'] * 0.21;
      //cualquier otro valor es 0
    } else {
      $impuestos = 0;
    }
    //el precio del producto mas el iva por la cantidad de productos 
    $impuestos = ($linea_pedido['precio'] + $impuestos) * $linea_pedido['cant'];
    return $impuestos;
  }


  $carrito = array(
    array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0),
    array("id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0),
    array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1),
    array("id" => 1237, "nombre" => "Pan", "precio" => 0.75, "cant" => 18, "iva_r" => 0)
  );
  $gasto = 0;

  echo "<table border='1' style='border-collapse: collapse'>";

  //este primer foreach saca las keys del primer array con valores y los imprime en la cabecera de la tabla
  $etiquetas = array_keys($carrito[0]);
  foreach ($etiquetas as $etiqueta) {
    echo "<th>" . strtoupper($etiqueta) . "</th>";
  }
  echo "<th>SUBTOTAL</th>";

  //Dado el array bidimensional dame ve dandome arrays 
  foreach ($carrito as $objeto) {
    echo "<tr>";

    //De un array asociativo saca las key y los valores e introduce los valores en las columnas
    foreach ($objeto as $key => $value) {
      echo "<td>";
      echo "$value";
      echo "</td>";
    }

    //Como subtotal no forma parte del array objeto hay que meterlo a mano
    echo "<td>";
    $gasto += subtotal($objeto);
    echo (subtotal($objeto));
    echo "</td>";

    echo "</tr>";
  }

  echo "<tr>";
  echo "<td><strong>TOTAL</strong></td>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td><strong>" . $gasto . "</strong></td>";

  echo "</table>";
  ?>
</body>

</html>